<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColleaguesController extends Controller
{
    public function __construct()
    {
        return $this->middleware("auth");
    }
    public function createList() {
        return view("colleagues.create-list");
    }
    public function edit($id) {
        return view("colleagues.edit",compact("id"));
    }
}
