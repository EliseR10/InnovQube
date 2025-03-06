<?php

namespace App\Livewire;

use Livewire\Component;

class BookingManager extends Component
{
    public $showModal = false;

    //Function to show the modal
    public function showModal() {
        $this->showModal = true;
    }

    //Function to close the modal
    public function closeModal() {
        $this->showModal = false;
    }

    //Handle form submission or changes
    public function saveChanges()
    {
        $this->showModal = false;  // Close the modal after saving
    }

    public function render()
    {
        return view('livewire.booking-manager')->layout('layouts.app');
    }
}
