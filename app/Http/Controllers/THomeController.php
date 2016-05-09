<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class THomeController extends Controller
{
    public function index() {
        
        $text = \App\Textfield::get()->first();
        return view('teach/Thome', ['hometext' => $text->hometext]);
    }
    
    public function updateText(Request $request) {
        $text = \App\Textfield::get()->first();
        if($request->by == 'home') {
            $text->hometext = $request['hometext'];
            $text-> update();
            return response()->json(['by home' => $text],200);
        } else { //by about
            $text->abouttext = $request['abouttext'];
            $text-> update();
            return response()->json(['by about' => $text],200);
        }
    }
}
