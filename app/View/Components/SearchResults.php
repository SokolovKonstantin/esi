<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SearchResults extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $searchResults;

    public function __construct($searchResults)
    {
        $this->searchResults = $searchResults;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.search-results');
    }
}
