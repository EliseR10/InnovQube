<?php

namespace App\Livewire\Modal;

use Livewire\Attributes\On; //for listening events
use App\Models\Bookings;
use App\Models\Property; 
use Livewire\Component;
use Carbon\Carbon;

class EditBooking extends Component
{
    public $bookingID;
    public $propertyID;
    public $propertyName;
    public $FormattedStartDate;
    public $FormattedEndDate;
    public $price;
    public $totalPrice;
    public $show = false;

    #[On('open-modal')] //listen to the events

    public function openModal($bookingID, $propertyID, $name, $startDate, $endDate, $price_per_night, $total_price) {
        //Load existing data into the modal
        $this->bookingID = $bookingID ?? 'N/A';
        $this->propertyID = $propertyID ?? 'N/A';
        $this->propertyName = $name ?? 'N/A';
        $this->FormattedStartDate = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
        $this->FormattedEndDate = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');;
        $this->price = $price_per_night ?? 'N/A';
        $this->totalPrice = $total_price ?? 'N/A';

        //Show modal
        $this->show = true;
    }

    public function closeModal() {
        $this->show = false;
    }

    public function calculateTotalPrice() {
        if ($this->FormattedStartDate && $this->FormattedEndDate) {
            $start = Carbon::parse($this->FormattedStartDate);
            $end = Carbon::parse($this->FormattedEndDate);

            if($start->lessThan($end)) {
                $days = $start->diffInDays($end); //Get the number of days between start and end
                $this->totalPrice = $days * $this->price;
            }
        }
    }

    public function saveChanges() {
        //Find the booking to update by its id
        $bookingToUpdate = Bookings::find($this->bookingID);

        if ($bookingToUpdate) {
            //Validate the inputs
            $this->validate([
                'FormattedStartDate' => 'required|date',
                'FormattedEndDate' => 'required|date|after:FormattedStartDate', //ensure endDate is after startDate
                'totalPrice' => 'required|numeric|min:1', // Ensure total price is calculated before submission
            ]);

            //Amend the booking in the database
            $bookingToUpdate -> update([
                'property_id' => $this->propertyID,
                'user_id' => auth()->id(),
                'price_per_night' => $this->price,
                'total_price' => $this-> totalPrice,
                'start_date' => $this->FormattedStartDate,
                'end_date' => $this-> FormattedEndDate,
            ]);

            //Show message that the booking was successfully amended
            session()->flash('message', 'Your booking has been successfully amended!');  

            //Reload the page
            $this->dispatch('reloadPage');
        }
    }

    public function render()
    {
        return view('livewire.modal.edit-booking');
    }
}
