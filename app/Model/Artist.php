<?php

namespace App\Model;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use DB;

class Artist extends Model
{
   //use Notifiable;
=======
use Illuminate\Notifications\Notifiable;

class Artist extends Authenticatable
{
    use Notifiable;
>>>>>>> 2dc26c84d1f2eb44d8e507a1faf16665acb86465

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'artistId', 'artistName', 'country', 'currency',
=======
        'name', 'country', 'currency',
>>>>>>> 2dc26c84d1f2eb44d8e507a1faf16665acb86465
    ];

    
    public function collections(){
        return $this->hasMany('App\Model\Collection');
    }    
}
