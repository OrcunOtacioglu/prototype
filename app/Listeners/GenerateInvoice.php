<?php

namespace App\Listeners;

use App\Events\OrderSuccessful;
use App\Models\Finance\Invoice;
use App\Models\Order;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateInvoice
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderSuccessful  $event
     * @return void
     */
    public function handle(OrderSuccessful $event)
    {
        $sale = Order::with('orderItems', 'attendee', 'event')->where('id', '=', $event->order->id)->first();
        $sale->status = 1;
        $sale->save();

        $invoice = Invoice::generate($sale);
        Invoice::generatePdfOf($invoice);
    }
}
