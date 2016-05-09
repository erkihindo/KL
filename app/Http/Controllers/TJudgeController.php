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

class TJudgeController extends Controller
{
    public function index() {
        $uploads = Upload::join('grades', 'grades.upload_id', '=', 'uploads.id', 'left outer')
                ->where('grades.id', null)
                ->select('uploads.id', 'uploads.user_id', 'uploads.test_id')
                ->get();
      
        return view('teach/Tjudge', 
                ['uploads' => $uploads]);
    }
    
    public function enterGrade(Request $request) {
        
        
        
        $newGrade = new Grade();
        $newGrade->upload_id = $request['code'];
        $newGrade->points = $request['points'];
        
        $newGrade->grade = intval($request->grade);
        $newGrade->description = $request->comments;
        //return response()->json(['hello' => $newGrade],200);
        if($newGrade->save()) {
            return response()->json(['Created succesfully'],200);
        } else {
            return response()->json(['There was an error'],200);
        }
        
        
        
    }
    public function viewUpload($id) {
        $upload = Upload::find($id);
        $filename = $upload->test_id . '_' . $upload->user_id . '.txt';
        $file = Storage::disk('local')->get($filename);
        dd($file);
    }
}
