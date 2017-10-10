<?php

namespace App\Listeners;

use App\Events\EventCreated;
use GuzzleHttp\Client;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        $client->request('POST', env('API_URL') . '/event', [
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
                'StartDate' => $object->event->start_date,
                'EndDate' => $object->event->end_date,
                'OnSaleDate' => $object->event->on_sale_date,
                'Featured' => $object->event->is_featured,
                'Status' => $object->event->status === 1 ? 'Published' : 'Draft',
                'Listing' => $object->event->listing === 0 ? 'Public' : 'Private'
            ]
        ]);
    }
}
