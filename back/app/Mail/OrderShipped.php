<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * 
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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
        return $this-> subject('Request leave')->markdown('emails.orders.shipped')->with(
            $this->data
        
    );
    }
}
