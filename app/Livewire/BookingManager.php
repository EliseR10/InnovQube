<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Bookings;
use App\Models\Property; 
use Carbon\Carbon;

class BookingManager extends Component
{
    public $name;
    public $price;
    public $id;
    public $bookings;
    public $startDate;
    public $endDate;
    public $property_id;
    public $price_per_night;
    public $total_price;

    //Get the selected property data
    public function mount($name = '', $price = 0, $id = '') {
        $this->name = urldecode($name);
        $this->price = $price;
        $this->id = $id;
        
        $this->price_per_night = $price;
        $this->startDate = Carbon::today()->format('Y-m-d');;
        $this->endDate = Carbon::tomorrow()->format('Y-m-d');;
        $this->total_price = 0;

    }

    public function calculateTotalPrice() {
        if ($this->startDate && $this->endDate) {
            $start = Carbon::parse($this->startDate);
            $end = Carbon::parse($this->endDate);

            if($start->lessThan($end)) {
                $days = $start->diffInDays($end); //Get the number of days between start and end
                $this->total_price = $days * $this->price_per_night;
            }
        }
    }

    public function submitBooking() {
        //Validate the inputs
        $this->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate', //ensure endDate is after startDate
            'total_price' => 'required|numeric|min:1', // Ensure total price is calculated before submission
        ]);

        //Create the booking in the database
        Bookings::create([
            'property_id' => $this->id,
            'user_id' => auth()->id(),
            'price_per_night' => $this->price_per_night,
            'total_price' => $this-> total_price,
            'start_date' => $this->startDate,
            'end_date' => $this-> endDate,
        ]);

        //Show message that booking is successfull
        session()->flash('messageCreated', 'Your booking has been successfully created!');  

        //Reset input to default values
        $this->reset(['startDate', 'endDate', 'total_price']);

        //Reload the page
        $this->dispatch('reloadPage');

    }

    public function deleteBooking($bookingID) {
        //Find the booking to update by its id
        $bookingToDelete = Bookings::find($bookingID);

        if ($bookingToDelete) {
            $bookingToDelete->delete();

            //Show message that the booking was successfully amended
            session()->flash('messageDeleted', 'Your booking has been successfully deleted!');  

            //Reload the page
            $this->dispatch('reloadPage');
        }
    }

    public function render()
    {
        //Retrieve the bookings from the database + properties data
        $this->bookings = Bookings::with('property')
            ->latest() //order by 'created_at' DESC
            ->get();

        //Format the start_date / end_date for each booking
        foreach($this->bookings as $booking) {
            $booking->formatted_start_date = Carbon::parse($booking->start_date)->format('d/m/Y');
            $booking->formatted_end_date = Carbon::parse($booking->end_date)->format('d/m/Y');
            $booking->formatted_updated_at = Carbon::parse($booking->updated_at)->format('d/m/Y H:i');
        }

        return view('livewire.booking-manager', ['bookings' => $this->bookings])->layout('layouts.app');
    }
}
