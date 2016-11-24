<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;

class Artist extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'country', 'currency',
    ];

    
    public function collections(){
        return $this->hasMany('App\Model\Collection');
    }    
}
