<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [PropertyController::class, 'index']);
