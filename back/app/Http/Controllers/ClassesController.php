<?php

namespace App\Http\Controllers;
use App\Models\Classes;
use Illuminate\Http\Request;
class ClassesController extends Controller
{
     //================== show all classes ====================
    public function index()
    {
        return Classes::all();
    }
    
     //=================== add new class  ======================
    public function store(Request $request)
    {
        $class = new Classes();
        $class->class= $request->class;

        $class->save();
        return response()->json(['message'=>'Successfully for create class']);
    }
}
