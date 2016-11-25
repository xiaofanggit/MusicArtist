<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
<<<<<<< HEAD
    public $fillable = ['trackId','trackName','trackPrice','collectionId'];
    public function collections()
    {
        return $this->belongTo('App\Model\Collection');
    }    
=======
    public $fillable = ['trackId','trackName','trackPrice'];
    public function collections()
    {
        return $this->belongTo('App\Model\Collection');
    }
    /*public function items(){
        return $this->hasMany('App\Model\Item');
    }
    public function findAssignedItem($id)
    {
         return DB::table('Tracks_items')->where('Track_id',  $id)->get()->keyBy('item_id')->toArray();
    }
    public function removeAssignedItem($Track_id, $item_id)
    {
        return DB::table('Tracks_items')->where([['Track_id',  $Track_id], ['item_id', $item_id]])->delete();
    }
    public function assignItemToLuggage($Track_id, $item_id)
    {        
        $Track_item = DB::table('Tracks_items')->where([['Track_id',  $Track_id], ['item_id', $item_id]])->first();
        if ($Track_item === null) {
           return DB::table('Tracks_items')->insert([
                ['Track_id' => $Track_id, 'item_id' => $item_id]
            ]);
        }
        return false;
    }*/
>>>>>>> 2dc26c84d1f2eb44d8e507a1faf16665acb86465
}
