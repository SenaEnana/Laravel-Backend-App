<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
//the above method that i imported is used to encode the password
// use Illuminate\View\View;


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

    function login(Request $req){
        $student= Student::where('email', $req->email)->first();
       if(!$student || !Hash::check($req->password,$student->password))
       {
        return ["error"=>"Email or Password is not match"];
       }
        return $student; 
    }
}