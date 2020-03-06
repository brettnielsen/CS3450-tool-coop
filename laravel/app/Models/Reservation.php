<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customerID',
        'reservation_out_date',
        'reservation_in_date',
        'check_out_date',
        'check_in_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function reservationItems()
    {
        return $this->hasMany(ReservationItems::class, 'reservationID');
    }

    public function items()
    {
        return $this->hasManyThrough(Item::class, ReservationItems::class, 'itemID', 'id', 'id', 'reservationID');
    }
}
