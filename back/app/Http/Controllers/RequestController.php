<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
class RequestController extends Controller
{
   //====================== show all request ==================
    public function index()
    {
        // return Requests::all();
        return Requests::with('student')->get();
    }

   //====================== add new request ===================
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
        Requests::create($offer);
        Mail::to('cham.smey@student.passerellesnumeriques.org')
        ->cc(['kimky.guinevere@gmail.com', 'loemsophimitstudent@gmail.com'])
        ->send(new OrderShipped($offer));

        // send mail notification
        return response()->Json(['messsage'=>'Scuccfully for create Request']);
        
    }

    //====================== show one request ===================
    public function show($id)
    {
        return Requests::findOrFail($id);
    }

    //====================== update request ===================
    public function update(Request $request,$id)
    {
        $offer = Requests::findOrFail($id);
        $offer->status = $request->status;
        $offer->save();
        return response()->Json(['messsage'=>'Scuccfully for create Request']);
    }

    //===================== delete request ======================
    public function destroy($id)
    {
        return Requests::destroy($id);
    }
}
