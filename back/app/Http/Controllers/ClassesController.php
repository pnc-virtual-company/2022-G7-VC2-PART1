<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Classes::all();
    }

    /**
     * Store a newly created resource in storage
     */
    public function store(Request $request)
    {
        $class = new Classes();
        $class->class= $request->class;

        $class->save();
        return response()->json(['message'=>'Successfully for create class']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
