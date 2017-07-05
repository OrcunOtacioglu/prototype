<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    protected $table = 'ticket_types';

    protected $fillable = [
        'account_id',
        'event_id',
        'name',
        'description',
        'price',
        'max_allowed_per_purchase',
        'min_allowed_per_purchase',
        'quantity_available',
        'quantity_sold',
        'sales_start_date',
        'sales_end_date',
        'is_paused',
        'absorb_fees'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
