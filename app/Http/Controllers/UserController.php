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

    function registration(Request $request)
    {        
        if ($request->hasFile('file_path')) { 
            $file = $request->file('file_path'); 
            $filename = time() . '_' . $file->getClientOriginalName(); 
            $file->storeAs('/public/users_image', $filename); 
            // $user ->file_path= $request->file('file')->store('users_image');
        } 
 
        $user = User::create([ 
            'name' => $request->input('name'), 
            'email' => $request->input('email'), 
            'file_path' => $filename, 
            'role' => $request->input('role'), 
            'password' => bcrypt($request->input('password')), 
            'confirmPassword' => bcrypt($request->input('confirmPassword')), 
        ]); 
        
        if(  $user->save()){
            return "hello again";
            // return response()->json(['message' => 'User registered successfully']);
          }
          return "sorry";
            // return response()->json(["status"=>500,"message"=>"internal server error"]);
    }

 
    function userLogin(Request $request){
        $user= User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password))
        {
            return ["error"=>"Email or Password is not match"];
        }
        return $user;
    }

    function userRole(Request $request){
        $user= User::where('email', $request->email)->first();
        if($user->role === "Admin")
        {
            return ["result"=>"you are admin you can access the information"];
            }
            return ["result"=>"you are either student or teacher you can't access"];
        }
  }