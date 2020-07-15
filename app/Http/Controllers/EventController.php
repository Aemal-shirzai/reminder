<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        return $this->middleware("auth");
    }
    public function createList() {
        return view("events.create-list");
    }
    public function edit($id) {
        return view("events.edit",compact("id"));
    }
}
