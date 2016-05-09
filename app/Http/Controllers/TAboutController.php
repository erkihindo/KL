<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TAboutController extends Controller
{
    public function index() {
        $text = \App\Textfield::get()->first();
   
        return view('teach/Tabout', ['abouttext' => $text->abouttext]);
    }
}
