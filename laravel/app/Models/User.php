<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    protected $table = 'users';

    public function reservation()
    {
        return $this->hasMany(Reservation::class, 'userID');
    }
}
