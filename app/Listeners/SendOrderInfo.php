<?php

namespace App\Listeners;

use App\Events\OrderCompleted;
use App\Events\OrderSuccessful;
use App\Models\Order;
use Carbon\Carbon;
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
        $response = $client->request('POST', env('API_URL') . '/sale', [
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
                'Phone' => '',
                'Password' => ''
            ]
        ]);
        $data = \GuzzleHttp\json_decode($response->getBody());

        $videoLink = $data->Ciphertext;

        $order = Order::find($event->order->id);
        $order->video_link = $videoLink;
        $order->updated_at = Carbon::now();
        $order->save();
        event(new OrderCompleted($event->order));
    }
}
