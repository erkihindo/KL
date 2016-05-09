<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Test;
use App\Upload;
use App\Uploaddoer;
use Illuminate\Support\Facades\Auth;

class STestsController extends Controller
{
    public function index() {
        
        $tests = Test::get();
        $user = Auth::user();
        $doneTests = Uploaddoer::where('user_id', $user->id)->lists('test_id');;
        $doneTests = $doneTests->toArray();
        $upload = Upload::where('user_id', $user->id)->get();
        return view('stud/Stests', ['tests' => $tests,
            'uploads' => $upload,
            'doneTests' => $doneTests]);
    }
}
