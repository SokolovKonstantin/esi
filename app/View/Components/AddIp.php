<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddIp extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $ip;

    public function __construct($ip)
    {
        $this->ip = $ip;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-ip');
    }
}
