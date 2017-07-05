<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'account_id',
        'title',
        'slug',
        'description',
        'cover_image',
        'location',
        'category',
        'type',
        'status',
        'listing',
        'start_date',
        'end_date',
        'on_sale_date'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function ticketTypes()
    {
        return $this->hasMany(TicketType::class);
    }

    public function tickets()
    {
        return $this->hasManyThrough('App\Models\Ticket', 'App\Models\TicketType');
    }
}
