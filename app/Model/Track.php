<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    public $fillable = ['trackId','trackName','trackPrice','collectionId'];
    public function collections()
    {
        return $this->belongTo('App\Model\Collection');
    } 
}
