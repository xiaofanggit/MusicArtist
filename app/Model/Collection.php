<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class Collection extends Model
{
    public $fillable = ['collectionId','collectionName','collectionPrice','artistId'];
    public function artists(){
        return $this->belongTo('\App\Model\Artist', 'id', 'artistId');
    }
    public function tracks(){
        return $this->hasMany('\App\Model\Track', 'collectionId', 'id');
    }   
}
