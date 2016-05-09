<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SHomeController extends Controller
{
    public function index() {
        $text = \App\Textfield::get()->first();
        return view('stud/Shome', ['hometext' => $text->hometext]);
    }
}
