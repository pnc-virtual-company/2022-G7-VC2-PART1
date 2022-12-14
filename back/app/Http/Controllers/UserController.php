<?php
namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //=========================== User login========================
    public function signIn(Request $request){
        $user = Student::Where('email',$request->email)->first();
        if ($user == null){
            $user = Admin::Where('email',$request->email)->first();
        }
        if ($user && Hash::check($request->password,$user->password)){
            return[
                'token'=>$user->createToken(time())->plainTextToken,'user'=>$user
            ];
        }
        else if(!$user){
            return ['sms'=>'wrong email'];
        }
        else{
            return ['mas'=>'Invalid password'];
        }
    }
<<<<<<< HEAD
    
    //========================== user sign out========================
=======

    //========================== user Log Out========================
>>>>>>> fb1f846b525343b193f9e88758de0c67b4611621
    public function signOut(){
        Auth()->user()->tokens()->delete();
        return Response()->json(['message'=>'has been left succesfully']);
    }

}