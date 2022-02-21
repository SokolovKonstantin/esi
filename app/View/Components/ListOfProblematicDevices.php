<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListOfProblematicDevices extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $listDevices;

    public function __construct($listDevices)
    {
        $this->listDevices = $listDevices;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.list-of-problematic-devices');
    }
}
