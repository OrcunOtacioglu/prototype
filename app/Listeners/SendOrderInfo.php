<?php

namespace App\Listeners;

use App\Events\OrderSuccessful;
use GuzzleHttp\Client;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderInfo
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
        $client = new Client();
        $client->request('POST', env('API_URL') . '/sale', [
            'json' => [
                'Credential' => [
                    'Username' => env('API_USER'),
                    'Password' => env('API_PASSWORD')
                ],
                'TicketReference' => $event->order->reference,
                'EventReference' => $event->order->event->slug,
                'DealerReference' => '',
                'Firstname' => $event->order->attendee->name,
                'Lastname' => $event->order->attendee->surname,
                'Email' => $event->order->attendee->email,
                'Phone' => $event->order->phone,
            ]
        ]);
    }
}
