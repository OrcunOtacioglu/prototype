<?php

namespace App\Listeners;

use App\Events\OrderSuccessful;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReserveTickets
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
        $event->order;
    }
}
