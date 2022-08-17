<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Admin::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = new Admin();
        $admin->First_name = $request->First_name;
        $admin->Last_name = $request->Last_name;
        $admin->Email = $request->Email;
        $admin->Password = bcrypt($request->password);
        
        $path = public_path('images');
        if ( ! file_exists($path) ) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('Profile');
        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        $admin->Profile = $fileName;
        $admin->save();
        $file->move($path, $fileName);

        $admin->save();
        return response()->Json(['messsage'=>'Scuccfully for admin']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
