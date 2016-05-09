<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\Test;
use App\Grade;
use App\Upload;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class TChangeController extends Controller
{
    public function index() {
        $uploads = Upload::join('grades', 'grades.upload_id', '=', 'uploads.id', 'left outer')
                ->where('grades.id', '!=', '')
                ->select('uploads.id', 'uploads.user_id', 'uploads.test_id')
                ->get();
        
        return view('teach/Tchange', ['uploads' => $uploads]);
    }
    
    
    public function changeGrade(Request $request) {
        
        
        
        
        $grade = Grade::where('upload_id', $request['upload'])->first();
       
        $grade->grade = intval($request->grade);
        $grade->points = intval($request->points);
        $grade->description = $request->comments;
        //return response()->json(['hello' => $newGrade],200);
        if($grade->update()) {
            return response()->json(['Updated succesfully'],200);
        } else {
            return response()->json(['There was an error'],200);
        }
        
    }
}
