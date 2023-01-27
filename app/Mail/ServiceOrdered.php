<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceOrdered extends Mailable
{
    use Queueable, SerializesModels;
    protected $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.book.orders', [
            'name' => $this->order->name,
            'orderNumber' => $this->order->orderNumber,
            'email' => $this->order->email,
            'phone' => $this->order->phone_number,
            'ordered_at' => $this->order->created_at->format('d/m/Y g:i A'), 
            'vehicle' => $this->order->vehicle,
            'description' => $this->order->description

        ])
        ->subject('New Order');
    }
}
