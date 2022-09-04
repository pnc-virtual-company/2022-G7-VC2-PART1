<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    private $data=[];
    private $user=[];
    /**
     * 
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$user)
    {
        $this->data = $data;
        $this->user=$user;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // ['name'=>'Cham Smey',
    // 'class'=>'WEP 2022 B',
    // 'leave_type'=>'go to wat phnom',
    // 'reason'=>'visit monkeys',
    // 'start_date'=>'8-19-2022',
    // 'end_date'=>'8-22-2022',
    // 'duration'=>'3 days',
    // ]
    public function build()
    {
        // send data to the
        return $this-> from('malwareattacker2022@gmail.com','user')-> subject('Request leave')->markdown('emails.orders.shipped')->with(
           ['request'=> $this->data,'user'=>$this->user]
        
    );
    }
}
