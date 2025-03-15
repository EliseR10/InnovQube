<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    //Define which attributes are mass assignable
    protected $fillable = [
        'user_id',
        'property_id',
        'price_per_night',
        'total_price',
        'start_date',
        'end_date',
    ];

    //Define the relationship to the Property Model
    public function property() {
        return $this->belongsTo(Properties::class);
    }

    //Define the relationship to the User Model
    public function user() {
        return $this->belongsTo(User::class);
    }
}
