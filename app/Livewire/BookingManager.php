<?php

namespace App\Livewire;

use Livewire\Component;

class BookingManager extends Component
{
    public $name;
    public $price;

    public function mount($name = '', $price = 0) {
        $this->name = urldecode($name);
        $this->price = $price;
    }


    public function render()
    {
        return view('livewire.booking-manager')->layout('layouts.app');
    }
}
