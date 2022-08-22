<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $students->First_name = $request->First_name;
        $students->Last_name = $request->Last_name;
        $students->Gender = $request->Gender;
        $students->Email = $request->Email;
        $students->Password = bcrypt($request->Password);
        $students->Phone_number = $request->Phone_number;
        $students->class_id = $request->class_id;
        $students->batch_id = $request->batch_id;
        $students->admin_id = $request->admin_id;

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
        $students->First_name = $request->First_name;
        $students->Last_name = $request->Last_name;
        $students->Gender = $request->Gender;
        $students->Email = $request->Email;
        $students->password = $request->Password;
        $students->phone_number = $request->phone_number;
        $students->class_id = $request->class_id;
        $students->batch_id = $request->batch_id;
        $students->admin_id = $request->admin_id;

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

    public function signIn(Request $request){
        $student = Student::where('Email', $request->email)->first();
        if(!$student || !Hash::check( $request->password,$student->password)){
            return response()->json(['message'=>'Invalid password !!'],404);
        }
        return response()->json(['message'=>'Scuccfully']);
    }
}
