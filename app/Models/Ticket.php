<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'ticket_type_id',
        'attendee_id',
        'status'
    ];

    public function ticketType()
    {
        return $this->belongsTo(TicketType::class);
    }

    public function attendee()
    {
        return $this->belongsTo(Attendee::class);
    }
}
