<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReservationItems extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reservationID',
        'itemID',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function item()
    {
        return $this->hasMany(Item::class, 'id', 'itemID');
    }

    public function reservation() {
        return $this->belongsTo(Reservation::class, 'reservationID', 'id');
    }
}
