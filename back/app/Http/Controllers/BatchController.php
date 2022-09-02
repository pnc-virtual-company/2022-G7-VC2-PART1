<?php
namespace App\Http\Controllers;
use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    //========================== get all batch =====================
    public function index()
    {
        return Batch::all();
    }

    //========================== create batch ======================
    public function store(Request $request)
    {
        $batch = new Batch();
        $batch->generation = $request->generation;
        
        $batch->save();
        return response()->Json(['messsage'=>'Scuccfully for Batch']);
    }
}
