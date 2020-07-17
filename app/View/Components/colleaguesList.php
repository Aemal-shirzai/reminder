<?php

namespace App\View\Components;

use App\Colleague;
use Illuminate\View\Component;

class colleaguesList extends Component
{
    public $colleagues;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->colleagues = Colleague::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.colleagues-list');
    }
}
