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
        // Store the uploaded file 
        if ($request->hasFile('file_path')) { 
            $file = $request->file('file_path'); 
            $filename = time() . '_' . $file->getClientOriginalName(); 
            $file->storeAs('users_image', $filename); // Store the file in the 'uploads' directory 
            // $user ->file_path= $req->file('file')->store('users_image');
        } 
 
        // Create a new user with the validated data and file path 
        $user = User::create([ 
            'name' => $request->input('name'), 
            'email' => $request->input('email'), 
            'file_path' => $filename, 
            'role' => $request->input('role'), 
            'password' => bcrypt($request->input('password')), 
            'confirmPassword' => bcrypt($request->input('confirmPassword')), 
        ]); 
         $user->save();
        // You can return a response or perform additional actions here 
        return response()->json(['message' => 'User registered successfully']);
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