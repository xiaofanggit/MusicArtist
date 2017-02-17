<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Artist extends Model
{   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'artistId', 'artistName', 'country', 'currency',
    ];

    
    public function collections(){
        return $this->hasMany('\App\Model\Collection', 'artistId', 'id');
    }

    /**
     * @param int $id artistId
     * @return int tracks of the artist
     */
    public function findTotalArtistTracksNumber($id){
        $result = DB::table('artists as a')
            ->select(DB::raw('count(*) as total'))
            ->join('collections as c', 'a.id', '=', 'c.artistId')
            ->join('tracks as t', 'c.id', '=', 't.collectionId')
            ->where('a.id' , '=' , $id)
            ->get();
        return $result->first();
    }

    /**
     * @param int $id srtistId
     * @param int $start
     * @return mixed
     */
    public function getArtistTracks($id, $start){
        $result = DB::table('artists as a')
            ->select('a.artistName', 'a.currency', 'a.country', 'c.collectionName', 'c.collectionPrice', 't.id', 't.trackName', 't.trackPrice')
            ->join('collections as c', 'a.id', '=', 'c.artistId')
            ->join('tracks as t', 'c.id', '=', 't.collectionId')
            ->where('a.id' , '=' , $id)
            ->offset($start)
            ->limit(config('customer.MAXIMUM_TRACKS'))
            ->orderBy('t.id')
            ->get();
        return $result->all();
    }
}
