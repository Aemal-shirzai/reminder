<?php

namespace App\View\Components;

use App\Event;
use Illuminate\View\Component;

class eventsList extends Component
{
    public $events;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->events = Event::orderBy("date","asc")->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.events-list');
    }
}
