<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'tickets';

    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_type_id',
        'attendee_id',
        'status'
    ];

    /**
     * Returns the related Ticket Type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticketType()
    {
        return $this->belongsTo(TicketType::class);
    }

    /**
     * Returns the related Attendee.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attendee()
    {
        return $this->belongsTo(Attendee::class);
    }
}
