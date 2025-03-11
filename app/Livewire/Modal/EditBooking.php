<?php

namespace App\Livewire\Modal;

use Livewire\Attributes\On; //for listening events
use Livewire\Component;
use Carbon\Carbon;

class EditBooking extends Component
{
    public $propertyID;
    public $propertyName;
    public $FormattedStartDate;
    public $FormattedEndDate;
    public $price;
    public $totalPrice;
    public $show = false;

    #[On('open-modal')] //listen to the events

    public function openModal($id, $name, $startDate, $endDate, $price_per_night, $total_price) {
        //dd($startDate, $endDate);
        //Load existing data into the modal
        $this->propertyID = $id ?? 'N/A';
        $this->propertyName = $name ?? 'N/A';
        $this->FormattedStartDate = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
        $this->FormattedEndDate = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');;
        $this->price = $price_per_night ?? 'N/A';
        $this->totalPrice = $total_price ?? 'N/A';

        //dd($this->FormattedStartDate, $this->FormattedEndDate);
        //Show modal
        $this->show = true;
    }

    public function closeModal() {
        $this->show = false;
    }

    //add function for saves changes
    
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

    public function render()
    {
        return view('livewire.modal.edit-booking');
    }
}
