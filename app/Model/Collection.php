<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class Collection extends Model
{
<<<<<<< HEAD
    public $fillable = ['collectionId','collectionName','collectionArtistId','collectionPrice'];
=======
    public $fillable = ['collectionId','collectionName','collectionPrice','collectionArtistId'];
>>>>>>> 2dc26c84d1f2eb44d8e507a1faf16665acb86465
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
