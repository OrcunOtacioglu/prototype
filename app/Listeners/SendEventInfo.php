<?php

namespace App\Listeners;

use App\Events\EventCreated;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendEventInfo
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
     * @param  EventCreated  $object
     * @return void
     */
    public function handle(EventCreated $object)
    {
        $client = new Client();
        $res = $client->request('POST', env('API_URL') . '/event', [
            'json' => [
                'Credential' => [
                    'Username' => env('API_USER'),
                    'Password' => env('API_PASSWORD')
                ],
                'Reference' => $object->event->slug,
                'Category' => $object->event->eventCategory->name,
                'Title' => $object->event->title,
                'Description' => $object->event->description,
                'Location' => $object->event->location,
                'Price' => $object->event->price,
                'StartDate' => Carbon::parse($object->event->start_date)->format('Y-m-d H:i'),
                'EndDate' => Carbon::parse($object->event->end_date)->format('Y-m-d H:i'),
                'OnSaleDate' => Carbon::parse($object->event->on_sale_date)->format('Y-m-d H:i'),
                'Featured' => $object->event->is_featured,
                'Status' => $object->event->status === 1 ? 'Published' : 'Draft',
                'Listing' => $object->event->listing === 0 ? 'Public' : 'Private'
            ]
        ]);

        $data = \GuzzleHttp\json_decode($res->getBody());

        if (!$data->IsSuccessfull) {
            Log::error('Event creation unsuccessfull!', [
                'event' => $object->event,
                'messages' => $data->messages
            ]);
        }
    }
}
