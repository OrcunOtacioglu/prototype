<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';

    protected $fillable = [
        'name',
        'address',
        'city',
        'postal_code',
        'country',
        'about',
        'website',
        'facebook_page',
        'twitter_page',
        'phone',
        'profile_image'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function ticketTypes()
    {
        return $this->hasMany(TicketType::class);
    }
}
