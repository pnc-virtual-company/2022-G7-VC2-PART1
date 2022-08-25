<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // User login
    public function signIn(Request $request){
        $user = Student::Where('email',$request->email)->first();
        if ($user==null){
            $user = Admin::Where('email',$request->email)->first();
        }
        if (Hash::check($request->password,$user->password)&& $user){
            return[
                'token'=>$user->createToken(time())->plainTextToken,'user'=>$user
            ];
        }
        else{
            return ['mas'=>'Invalid password'];
        }
    }

    // user sign out
    public function signOut(){
        Auth()->user()->tokens()->delete();
        return Response()->json(['message'=>'has been left succesfully']);
    }
}
