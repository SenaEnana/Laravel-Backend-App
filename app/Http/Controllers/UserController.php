<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Customer;
use App\Models\CreateStudent;
use App\Models\CreateTeacher;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   /**
     * Show the profile for a given user.
     */
    function show(Request $req)
    {
        $student= new Student;
        $student ->name= $req->input('name');
        $student ->email= $req->input('email');
        $student ->phoneNo= $req->input('phoneNo');
        $student ->address= $req->input('address');
        $student ->password= Hash::make($req->input('password'));
       
        $student ->save();
        return $student;

    }
    
function addition(Request $req)
{
    $customer = new Customer;
    $customer->expert = $req->input('expert');
    $customer->select = $req->input('select');
    $customer->subject = $req->input('subject');
    $customer->time = $req->input('time');
    $customer ->password= Hash::make($req->input('password'));
   
    $customer ->save();
    return $customer;
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
