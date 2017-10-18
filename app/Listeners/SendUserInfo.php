<?php

namespace App\Listeners;

use Acikgise\Helpers\Helpers;
use App\Events\UserRegistered;
use GuzzleHttp\Client;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendUserInfo
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $client = new Client();
        $res = $client->request('POST', env('API_URL') . '/customer', [
            'json' => [
                'Credential' => [
                    'Username' => env('API_USER'),
                    'Password' => env('API_PASSWORD')
                ],
//                'ReferenceEmail' => $event->data['email'],
                'Firstname' => $event->data['registerName'],
                'Lastname' => $event->data['registerSurname'],
                'Email' => $event->data['registerEmail'],
                'Phone' => $event->data['registerPhone'],
                'Password' => Helpers::encrypt(env('API_ENCRYPT_KEY'), $event->data['registerPassword'])
            ]
        ]);

        $data = \GuzzleHttp\json_decode($res->getBody());
        if (!$data->IsSuccessful) {
            Log::error('User creation unsuccessfull!', [
                'user' => $event->data['registerEmail'],
                'messages' => $data->Messages
            ]);
        } else {
            Log::info('User created successfully!', [
                'user' => $event->data['registerEmail']
            ]);
        }
    }
}
