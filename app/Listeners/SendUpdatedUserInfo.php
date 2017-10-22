<?php

namespace App\Listeners;

use Acikgise\Helpers\Helpers;
use App\Events\UserUpdated;
use GuzzleHttp\Client;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendUpdatedUserInfo
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
     * @param  UserUpdated  $event
     * @return void
     */
    public function handle(UserUpdated $event)
    {
        $client = new Client();
        $res = $client->request('POST', env('API_URL') . '/customer', [
            'json' => [
                'Credential' => [
                    'Username' => env('API_USER'),
                    'Password' => env('API_PASSWORD')
                ],
                'ReferenceEmail' => $event->attendee->email,
                'Firstname' => $event->attendee->name,
                'Lastname' => $event->attendee->surname,
                'Email' => $event->attendee->email,
                'Phone' => $event->attendee->phone,
                'Password' => Helpers::encrypt(env('API_ENCRYPT_KEY'), $event->request->password)
            ]
        ]);

        Log::notice('Updated user info has been sent!', [
            'json' => [
                'Credential' => [
                    'Username' => env('API_USER'),
                    'Password' => env('API_PASSWORD')
                ],
                'ReferenceEmail' => $event->attendee->reference,
                'Firstname' => $event->attendee->name,
                'Lastname' => $event->attendee->surname,
                'Email' => $event->attendee->email,
                'Phone' => $event->attendee->phone,
                'Password' => Helpers::encrypt(env('API_ENCRYPT_KEY'), $event->request->password)
            ]
        ]);

        $data = \GuzzleHttp\json_decode($res->getBody());

        if (!$data->IsSuccessful) {
            Log::error('User update unsuccessfull!', [
                'user' => $event->attendee->email,
                'messages' => $data->Messages
            ]);
        } else {
            Log::info('User updated successfully!', [
                'user' => $event->attendee->email
            ]);
        }
    }
}
