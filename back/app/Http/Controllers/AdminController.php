<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    //====================== show all admin ===================
    public function index()
    {
        return Admin::all();
    }
    // ================show spcific admin =================
    public function show($id)
    {
        return Admin::findOrFail($id);
    }
    //====================== add new admin ===================
    public function store(Request $request)
    {
        $admin = new Admin();
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->role = $request->role;
        $admin->password = bcrypt($request->password);
        $admin->profile = $request->profile;
        $admin->save();
        return('sucessfully');
        
    }

   //========================== Reset password ==================
    public function adminResetPassword(Request $request, $adminId){
        $admin = Admin::find($adminId);
        if(Hash::check($request->oldpassword, $admin->password)){
            $admin->password = bcrypt($request->newPassword);
        }
        $admin->save();
        return Response()->json($admin);
    }

}
