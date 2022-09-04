<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
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
     * Store a newly created resource in storage​.
     */
    public function store(Request $request)
    {   
        $offer = $request->validate([
          'start_date' => 'required|Date',
          'end_date' => 'required|Date',
          'leave_Type' => 'required|string',
          'status' => 'required|string',
          'reason' => 'required|string',
          'duration'=> 'required|integer',
          'student_id' => 'required|integer',
        ]);
        // send email to the author


    try{
        $user = Student::findOrFail($request->student_id);
        Requests::create($offer);   
        Mail::to('cham.smey@student.passerellesnumeriques.org')
        ->cc(['kimky.guinevere@gmail.com', 'loemsophimitstudent@gmail.com'])
        // send mail notification
        ->send(new OrderShipped($offer,$user));
        return response()->Json(['messsage'=>'your request succesfully']);

    }
   catch (\Exception $e){
    return response()->Json(['messsage'=>'Sorry please try again later !']);
   }
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Requests::findOrFail($id);
    }

    /*
     Update the specified resource in storage
     */
    public function update(Request $request,$id)
    {
        $offer = Requests::findOrFail($id);
        $offer->status = $request->status;
        $offer->save();
        return response()->Json(['messsage'=>'Scuccfully for create Request']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return Requests::destroy($id);
    }
}
