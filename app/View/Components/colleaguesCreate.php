<?php

namespace App\View\Components;

use App\Religion;
use Illuminate\View\Component;

class colleaguesCreate extends Component
{
    public $religions;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->religions = Religion::pluck("name","id");
    }
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.colleagues-create');
    }
}
