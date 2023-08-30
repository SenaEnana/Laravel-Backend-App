<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\userAddInfo;
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
        $user= new User;
        $user ->name= $req->input('name');
        $user ->email= $req->input('email');
        // $user ->phoneNo= $req->input('phoneNo');
        // $user ->address= $req->input('address');
        // $user ->confirm= Hash::make($req->input('password'));
        $user ->password= Hash::make($req->input('password'));
       
        $user ->save();
        return $user;
    }
function addition(Request $req)
{
  
    $userAddInfo = new userAddInfo;
    $userAddInfo->expert = $req->input('expert');
    $userAddInfo->select = $req->input('select');
    // $userAddInfo->subject = $req->input('subject');
    // $userAddInfo->time = $req->input('time');
    $userAddInfo ->password= Hash::make($req->input('password'));
    
    $userAddInfo ->save();
    return $userAddInfo;
}

    function login(Request $req){
        $user= User::where('email', $req->email)->first();
       if(!$user || !Hash::check($req->password,$user->password))
       {
        return ["error"=>"Email or Password is not match"];
       }
        return $user; 
    }
}
