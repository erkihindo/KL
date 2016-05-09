<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Test;
use App\Upload;
use App\Student;
use App\Uploaddoer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SEnterController extends Controller
{
    public function index($id) {
        $userCode = Student::where('user_id', Auth::user()->id)->first();
        $test = Test::find($id);
        $students = Student::join('users', 'users.id', '=', 'students.user_id')
                ->where('users.admin', false)
                ->where('users.id', '!=', Auth::user()->id)
                ->get();
      
        return view('stud/Senter', ['test' => $test,
            'students' => $students,
            'userCode' => $userCode]);
    }
    
    
    
    public function upload(Request $request) {
      
        $user = Auth::user();
        
        $file = $request ->file('fily');
        $filename = $request['test'] . '_' . $user->id . '.txt';
        if($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        $up =Upload::where('user_id', $user->id)->where('test_id', $request['test'])->first();
        
        if($up == null) {
            
            $upload = new Upload();
            $upload->user_id = $user->id;
            $upload->test_id = $request['test'];
            $upload->save();
            
            
        }
        
           
        
    
        return redirect()->route('Stests');
    
    }
    
    public function enterComrad(Request $request) {
        
        
        $student = Student::where('code', $request['code'])->first();
        
        $comrad = new Uploaddoer();
        $upload = Upload::where('user_id', Auth::user()->id)->where('test_id', $request['test'])->first();
        if($upload == null) {
            $uploadID = Upload::get()->count();
            $uploadID ++;
            $comrad->upload_id = $uploadID;
        
            $comrad->test_id = $request['test'];
            $comrad->user_id = $student->user_id;
        
            $comrad->save();
        } else {
            $comrad->upload_id = $upload->id;
        
            $comrad->test_id = $request['test'];
            $comrad->user_id = $student->user_id;

            $comrad->save();
            
        }
        
        return($comrad);
    }
}
