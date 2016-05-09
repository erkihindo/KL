<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Uploaddoer;

use Illuminate\Support\Facades\Auth;

class SOverallController extends Controller
{
    public function index() {
        $grades = Uploaddoer::join('grades', 'grades.upload_id', '=', 'uploaddoers.upload_id')
                ->where('uploaddoers.user_id', Auth::user()->id)
                ->get();
        
        return view('stud/Soverall', ['grades' => $grades]);
        //dd($grades);
    }
}
