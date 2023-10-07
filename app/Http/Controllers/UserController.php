<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Models\Role; 

class UserController extends Controller
{
   /**
     * Show the profile for a given user.
     */

    function registration(Request $req)
    {
        $user= new User;
        $user ->name= $req->input('name');
        $user ->email= $req->input('email');
        $user ->role= $req->input('role');
        $user ->file_path= $req->file('file')->store('users_image');
        $user ->password= Hash::make($req->input('password'));
        $user ->confirmPassword= Hash::make($req->input('confirmPassword'));
       
      if(  $user ->save()){
        return $user;
      }
        return response()->json(["status"=>500,"message"=>"internal server error"]);
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