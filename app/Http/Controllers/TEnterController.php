<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\Test;
use App\Grade;

class TEnterController extends Controller
{
    public function index() {
        $students = Student::join('users', 'users.id', '=', 'students.user_id')
                ->where('users.admin', false)->get();
        $tests = Test::get()->lists('name');;
        return view('teach/Tenter', 
                ['students' => $students,
                'tests' => $tests]);
    }
    
    public function enterGrade(Request $request) {
        
        $student = Student::where('code', $request->code)->first();
        
        $test = Test::where('name', $request->test)->first();
        
        $newGrade = new Grade();
        $newGrade->user_id = intval($student->user_id);
        $newGrade->test_id = $test->id;
        $newGrade->grade = intval($request->grade);
        $newGrade->description = $request->comments;
        //return response()->json(['hello' => $newGrade],200);
        if($newGrade->save()) {
            return response()->json(['Created succesfully'],200);
        } else {
            return response()->json(['There was an error'],200);
        }
        
        
        
    }
}
