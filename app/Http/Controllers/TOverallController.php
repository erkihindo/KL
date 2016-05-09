<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Test;
class TOverallController extends Controller
{
    public function index() {
        $students = User::where('admin', false)->get();
        $tests = Test::get();
        return view('teach/Toverall', ['students' => $students,
            'tests' => $tests]);
    }
}
