<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify($student_id, Request $request){
        if(!$request->hasValidSignature()){
            return response()->json(['msg'=>"Invalid/Expired url provided."], status: 401);
        }
        $student = Student::findOrFail($student_id);

        if(!$student->hasVerifiedEmail()) {
            $student->markEmailVerified();
        }else{
            return response()->json([
                'status' =>400,
                'message' =>"Email already verified"
            ],status: 400);
        }

        return response()->json([
            'status' => 200,
            'message' => "Your Email $student_email successfully verified"
        ], status: 200);
    }
}
