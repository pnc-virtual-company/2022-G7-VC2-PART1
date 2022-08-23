<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Student;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function signIn(Request $request){
        $user = User::Where('email',$request->email)->first();
        if(!$user || !Hash::check($user->password,$request->password)){
            return Response()->json(['Error'=>'Invalid password']);
        };
        $token = $user->createToken('token')->plainTextToken;
        return Response()->json(['user'=>$user,'token'=>$token]);
    }
}
