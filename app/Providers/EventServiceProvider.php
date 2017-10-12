<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\OrderSuccessful' => [
            'App\Listeners\SendOrderInfo',
            'App\Listeners\ClearShoppingCart',
            'App\Listeners\GenerateInvoice',
        ],
        'App\Events\OrderCompleted' => [
            'App\Listeners\SendOrderConfirmationMail',
        ],
        'App\Events\EventCreated' => [
            'App\Listeners\SendEventInfo'
        ],
        'App\Events\EventUpdated' => [
            'App\Listeners\SendUpdatedEventInfo'
        ],
        'App\Events\UserRegistered' => [
            'App\Listeners\SendUserInfo'
        ],
        'App\Events\UserUpdated' => [
            'App\Listeners\SendUpdatedUserInfo',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
