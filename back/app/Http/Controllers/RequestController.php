<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Requests::all();
        return Requests::with('student')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $offer = new Requests();
        $offer->Start_date = $request->Start_date;
        $offer->End_date = $request->End_date;
        $offer->Leave_Type = $request->Leave_Type;
        $offer->Status = $request->Status;
        $offer->student_id = $request->student_id;

        $offer->save();
        return response()->Json(['messsage'=>'Scuccfully for create Request']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    
}
