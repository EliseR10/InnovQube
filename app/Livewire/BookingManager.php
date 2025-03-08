<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Bookings; 
use Carbon\Carbon;

class BookingManager extends Component
{
    public $name;
    public $price;
    public $bookings;

    //Get the selected property data
    public function mount($name = '', $price = 0) {
        $this->name = urldecode($name);
        $this->price = $price;

        //Retrieve all bookings from the database
        $this->bookings = Bookings::all();

        //Format the start_date / end_date for each booking
        foreach($this->bookings as $booking) {
            $booking->formatted_start_date = Carbon::parse($booking->start_date)->format('d/m/Y');
            $booking->formatted_end_date = Carbon::parse($booking->end_date)->format('d/m/Y');
        }
    }


    public function render()
    {
        return view('livewire.booking-manager', ['bookings' => $this->bookings])->layout('layouts.app');
    }
}
