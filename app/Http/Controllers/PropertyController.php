<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properties;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index() {
        //Fetch all properties from the databases
        $properties = Properties::all();

        //Pass properties to the view
        return view('welcome', compact('properties'));
    }
}

    

