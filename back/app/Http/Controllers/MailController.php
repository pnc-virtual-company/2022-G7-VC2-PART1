<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;

class MailController extends Controller
{
    //
    // public function sendMail()
    // {
    //     // $username = 'cham';
    //     Mail::to('cham.smey@student.passerellesnumeriques.org')
    //     ->cc(['kimky.guinevere@gmail.com', 'loemsophimitstudent@gmail.com'])
    //     // ->send(new OrderShipped());
    // }
}
