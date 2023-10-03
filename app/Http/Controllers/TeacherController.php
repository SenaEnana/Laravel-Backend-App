<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    
 function createTeacher(Request $req){

         $teacher = new Teacher;
        $teacher->name = $req->input('name');
        $teacher->phoneNo = $req->input('phoneNo');
        $teacher->address = $req->input('address');
        $teacher->gender = $req->input('gender');
        $teacher->expert= $req->input('expert');
        $teacher->educationLevel = $req->input('educationLevel');
        $teacher->date = $req->input('date'); 

        if( $teacher ->save()){
            return $teacher;
          }
            return response()->json(["status"=>500,"message"=>"internal server error"]);
    }

    
function listTeachers(){
    return Teacher::all();
}

function deleteTeacher($id)
{
    $teacher_result = Teacher::where('id',$id)->delete();
    if($teacher_result)
    {
        return ["$teacher_result"=>"teacher has been deleted"];
    }
    else{
        return ["$teacher_result"=>"operation failed user already deleted!"];
    }
}

function getTeacher($id){
    return Teacher::find($id);
}

function updateTeacher($id, Request $req){
    $teacher = Teacher::find($id);
    $teacher->name = $req->name;
    $teacher->phoneNo = $req->phoneNo;
    $teacher->address = $req->address;
    $teacher->expert = $req->expert;
    $teacher->gender = $req->gender;
    $teacher->educationLevel = $req->educationLevel;
    $teacher->date = $req->date; 

    $result = $teacher->save(); 
    if($result){
        return ["result"=>"teacher is updated"];
    }else{
        return ["result"=>"teacher is not updated"];
    }
}
}
