<?php

namespace App\Models;


use App\Models\Finance\Invoice;
use Illuminate\Foundation\Auth\User as Authenticable;

class Attendee extends Authenticable
{
    /**
     * Tablename.
     *
     * @var string
     */
    protected $table = 'attendees';

    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    /**
     * Returns the tickets belong to Attendee.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Returns all related Orders.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
