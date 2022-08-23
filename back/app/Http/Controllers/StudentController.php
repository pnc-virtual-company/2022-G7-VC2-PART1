<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Student::all();
        return Student::with(['class','batch','admin'])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $students = new Student();
        $students->first_name = $request->first_name;
        $students->last_name = $request->last_name;
        $students->gender = $request->gender;
        $students->email = $request->email;
        $students->password = bcrypt($request->password);
        $students->phone_number = $request->phone_number;
        $students->role = $request->role;
        $students->class_id = $request->class_id;
        $students->batch_id = $request->batch_id;
        $students->admin_id = $request->admin_id;
        $path = public_path('images/Student');
        if ( ! file_exists($path) ) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('profile');
        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        $students->Profile = $fileName;
        $students->save();
        $file->move($path, $fileName);

        $students->save();
        return response()->Json(['messsage'=>'Scuccfully for Create Student']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $students = Student::findOrFail($id);
        $students->first_name = $request->first_name;
        $students->last_name = $request->last_name;
        $students->gender = $request->gender;
        $students->email = $request->email;
        $students->role = $request->role;
        $students->password = bcrypt($request->password);
        $students->phone_number = $request->phone_number;
        $students ->profile = $request->profile;
        $students->class_id = $request->class_id;
        $students->batch_id = $request->batch_id;
        $students->admin_id = $request->admin_id;
        $path = public_path('images/Student');
        if ( ! file_exists($path) ) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('profile');
        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        $students->Profile = $fileName;
        $students->save();
        $file->move($path, $fileName);

        $students->save();
        return response()->Json(['messsage'=>'Scuccfully for Update Student']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Student::destroy($id);
    }
}
