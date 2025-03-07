<?php

namespace App\Livewire\Modal;

use Livewire\Attributes\On; //for listening events
use Livewire\Component;

class EditBooking extends Component
{
    public $propertyName;
    public $startDate;
    public $endDate;
    public $price;
    public $show = false;

    #[On('open-modal')] //listen to the events

    public function openModal() {
        //Load existing data into the modal
        /*$this->propertyName = $data['propertyName'] ?? 'N/A';
        $this->startDate = $data['startDate'] ?? 'N/A';
        $this->endDate = $data['endDate'] ?? 'N/A';
        $this->price = $data['price'] ?? 'N/A';*/

        //Show modal
        $this->show = true;
    }

    public function closeModal() {
        $this->show = false;
    }

    //add saves changes
    

    public function render()
    {
        return view('livewire.modal.edit-booking');
    }
}
