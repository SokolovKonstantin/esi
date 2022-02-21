<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddSid extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $sid;

    public function __construct($sid)
    {
        $this->sid = $sid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-sid');
    }
}
