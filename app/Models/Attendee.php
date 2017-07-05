<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
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
