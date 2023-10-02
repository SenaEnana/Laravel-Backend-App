<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

function createStudent(Request $req){

     $student = new Student;
    $student->name = $req->input('name');
    $student->gender = $req->input('gender');
    $student->grade = $req->input('grade');
    $student->subject = $req->input('subject');
    $student->date = $req->input('date'); 

    if($student ->save()){
        return $student;
      }
        return response()->json(["status"=>500,"message"=>"internal server error"]);
}


function listStudents(){
    return Student::all();
}

function deleteStudent($id){

    $student_result = Student::where('id',$id)->delete();
    if($student_result){
        return ["$student_result"=>"student has been deleted"];
    }else{
        return ["$student_result"=>"operation failed user already deleted!"];
    }
}

function getStudent($id){
    return Student::find($id);
}

function updateStudent($id, Request $req){
    error_log($req);
    $student = Student::find($id);
    $student->name = $req->name;
    $student->gender = $req->gender;
    $student->grade = $req->grade;
    $student->subject = $req->subject;
    $student->date = $req->date; 

    $result = $student->save(); 
    if($result){
        return ["result"=>"student is updated"];
    }else{
        return ["result"=>"student is not updated"];
    }
}
}
