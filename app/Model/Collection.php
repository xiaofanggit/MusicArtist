<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class Collection extends Model
{
    public $fillable = ['collectionId','collectionName','collectionPrice','collectionArtistId'];
    public function artists(){
        return $this->belongTo('App\Model\Artist');
    }
    public function tracks(){
        return $this->hasMany('App\Model\Track');
    } 
    /*public function findCollectionsByUser($id) {
        return DB::table('items')->where('user_id',  $id)->get()->keyBy('id')->toArray();        
    }*/
}
