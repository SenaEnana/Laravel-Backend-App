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
    $student->phoneNo = $req->input('phoneNo');
    $student->address = $req->input('address');
    $student->gender = $req->input('gender');
    $student->grade = $req->input('grade');
    $student->subject = $req->input('subject');
    $student->day = $req->input('day'); 
    $student->time = $req->input('time'); 

     if( $student ->save()){
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
    $student = Student::find($id);
    $student->name = $req->name;
    $student->phoneNo = $req->phoneNo;
    $student->address = $req->address;
    $student->gender = $req->gender;
    $student->grade = $req->grade;
    $student->subject = $req->subject;
    $student->day = $req->day; 
    $student->time = $req->time; 

    $result = $student->save(); 
    if($result){
        return ["result"=>"student is updated"];
    }else{
        return ["result"=>"student is not updated"];
    }
}
}    
