<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    //Define which attributes are mass assignable
    protected $fillable = [
        'name',
        'description',
        'price_per_night',
    ];
}
