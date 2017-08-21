<?php

namespace App\Listeners;

use App\Events\OrderSuccessful;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClearShoppingCart
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
     * Handles the event.
     *
     * @param OrderSuccessful $event
     * @return mixed
     */
    public function handle(OrderSuccessful $event)
    {
        Cart::destroy();
    }
}
