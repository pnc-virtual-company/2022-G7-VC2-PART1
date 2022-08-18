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
        $offer = $request->validate([
          'Start_date' => 'required|Date',
          'End_date' => 'required|Date',
          'Leave_Type' => 'required|string',
          'Status' => 'required|string',
          'Reason' => 'required|string',
          'student_id' => 'required|integer',
        ]);
        
        Requests::create($offer);
        return response()->Json(['messsage'=>'Scuccfully for create Request']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Requests::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $offer = Requests::findOrFail($id);
        $offer->Status = $request->Status;
        $offer->save();
        return response()->Json(['messsage'=>'Scuccfully for create Request']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Requests::destroy($id);
    }
}
