<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class card extends Component
{
    public $image;
    public $name;
    public $description;
    public $price;
    
    /**
     * Create a new component instance.
     */
    public function __construct($image = "", $name = "", $description = "", $price = 0)
    {
        //
        $this->image = $image;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
