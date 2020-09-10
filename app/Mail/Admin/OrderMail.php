<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Order;
use DB;
use App\Status;
use App\Product;
use App\Order_detail;
class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mail_order;
    public $order;
    public $orderID;
    public $status;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_order,$order,$status,$orderID)
    {
        $this->mail_order = $mail_order;
        $this->order = $order;
        $this->status = $status;
        $this->orderID = $orderID;
          //dd($orderID);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('admin.mail.order_mail');
    }
}
