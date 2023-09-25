<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CreateStudent;
use App\Models\CreateTeacher;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   /**
     * Show the profile for a given user.
     */

    function register(Request $req)
    {
        $user= new User;
        $user ->name= $req->input('name');
        $user ->email= $req->input('email');
        $user ->phoneNo= $req->input('phoneNo');
        $user ->address= $req->input('address');
        $user ->password= Hash::make($req->input('password'));
        $user ->confirmPassword= Hash::make($req->input('confirmPassword'));
       
        $user ->save();
        return $user;

    }
    
function study(Request $req)
{
     $create_student = new CreateStudent;
    $create_student->name = $req->input('name');
    $create_student->gender = $req->input('gender');
    $create_student->grade = $req->input('grade');
    $create_student->subject = $req->input('subject');
    $create_student->date = $req->input('date'); 

    $create_student ->save();
    return $create_student;
}

function teach(Request $req)
{
     $create_teacher = new CreateTeacher;
    $create_teacher->name = $req->input('name');
    $create_teacher->gender = $req->input('gender');
    $create_teacher->expert= $req->input('expert');
    $create_teacher->educationLevel = $req->input('educationLevel');
    $create_teacher->date = $req->input('date'); 

    $create_teacher ->save();
    return $create_teacher;
}

    function login(Request $req){
        $student= Student::where('email', $req->email)->first();
       if(!$student || !Hash::check($req->password,$student->password))
       {
        return ["error"=>"Email or Password is not match"];
       }
        return $student; 
    }

    function listStudents()
    {
return CreateStudent::all();
    }

    function listTeachers()
{
return CreateTeacher::all();
}

function deleteStudent($id)
{
    $student_result = CreateStudent::where('id',$id)->delete();
if($student_result)
{
    return ["$student_result"=>"student has been deleted"];
}
else{
    return ["$student_result"=>"operation failed user already deleted!"];
}
}

function deleteTeacher($id)
{
    $teacher_result = CreateTeacher::where('id',$id)->delete();
if($teacher_result)
{
    return ["$teacher_result"=>"teacher has been deleted"];
}
else{
    return ["$teacher_result"=>"operation failed user already deleted!"];
}
}

function getStudent($id){
    return CreateStudent::find($id);
}

function getTeacher($id){
    return CreateTeacher::find($id);
}

function updateStudent(Request $req){
    $create_student = CreateStudent::find($req->id);
    $create_student->name = $req->name;
    $create_student->gender = $req->gender;
    $create_student->grade = $req->grade;
    $create_student->subject = $req->subject;
    $create_student->date = $req->date; 

    $result = $create_student->save(); 
if($result){
    return ["result"=>"student is updated"];
}else{
    return ["result"=>"student is not updated"];
}
}

function updateTeacher(Request $req){
    $create_teacher = CreateTeacher::find($req->id);
    $create_teacher->name = $req->name;
    $create_teacher->expert = $req->expert;
    $create_teacher->gender = $req->gender;
    $create_teacher->educationLevel = $req->educationLevel;
    $create_teacher->date = $req->date; 

    $result = $create_teacher->save(); 
if($result){
    return ["result"=>"teacher is updated"];
}else{
    return ["result"=>"teacher is not updated"];
}
}
}




//         if($student){
//             try{
// Mail::mailer(name: 'smtp')->to($student->email)->send(new UserVerification($student));

// return response()->json([
//     'status' =>200,
//     'message' => "Registered,verify your email address to login",
// ],status: 200);
//             }catch(\Exception $err){
// $student->delete();

//                 return response()->json([
//                     'status' => 500,
//                     'errors' => "could not send email verification,please try again",
//                 ],status: 500);
//             }
//         }
