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
        $event->order->status = 1;
        $event->order->save();

        $invoice = Invoice::generate($event->order);
        Invoice::generatePdfOf($invoice);
    }
}
