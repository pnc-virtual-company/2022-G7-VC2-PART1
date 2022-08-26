<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signIn(Request $request){
        $user = Student::Where('email',$request->email)->first();
        if ($user==null){
            $user = Admin::Where('email',$request->email)->first();
        }
        if(! $user || Hash::check($user->password,$request->password)){
            return Response()->json(['Error'=>'Invalid password']);
        };
        $token = $user->createToken('userToken')->plainTextToken;
        return Response()->json(['user'=>$user,'token'=>$token]);
    }
}
