<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Location extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $location;

    public function __construct($location)
    {
        $this->location = $location;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.location');
    }
}
