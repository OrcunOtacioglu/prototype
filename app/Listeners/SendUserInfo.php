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
                'Firstname' => $event->data['name'],
                'Lastname' => $event->data['surname'],
                'Email' => $event->data['email'],
                'Phone' => $event->data['phone'],
                'Password' => Helpers::encrypt(env('API_ENCRYPT_KEY'), $event->data['password'])
            ]
        ]);

        $data = \GuzzleHttp\json_decode($res->getBody());

        if (!$data->IsSuccessfull) {
            Log::error('User creation unsuccessfull!', [
                'user' => $event->data['email'],
                'messages' => $data->messages
            ]);
        }
    }
}
