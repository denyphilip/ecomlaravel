<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class orderMailToUser extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct($data)
    {
        $this->data=$data;
    }

    public function build()
    {
        $data=$this->data;
        return $this->from('example@example.com', 'Example')->view('Mail.orderMailToUser')->with(['product_name'=>$data['pname']]);
    }
}