<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticable;

class Attendee extends Authenticable
{
    protected $table = 'attendees';

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
