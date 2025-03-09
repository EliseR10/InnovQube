<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class card extends Component
{
    public $image;
    public $name;
    public $id;
    public $description;
    public $price;
    
    /**
     * Create a new component instance.
     */
    public function __construct($image = "", $name = "", $description = "", $price = 0, $id = "")
    {
        //
        $this->image = $image;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
