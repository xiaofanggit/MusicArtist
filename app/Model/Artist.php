<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Artist extends Model
{
   //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'artistId', 'artistName', 'country', 'currency',
    ];

    
    public function collections(){
        return $this->hasMany('App\Model\Collection');
    }    
}
