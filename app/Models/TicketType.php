<?php

namespace App\Models;

use Acikgise\Helpers\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TicketType extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'ticket_types';

    /**
     * Mass assignable fields.
     *
     * @var array
     */
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

    /**
     * Returns the related Account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * Returns the related Event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Returns all related Tickets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Creates a new Ticket Type resource.
     *
     * @param Request $request
     * @return TicketType
     */
    public static function createNew(Request $request)
    {
        $rate = new TicketType();

        $rate->account_id = $request->accountID;
        $rate->event_id = $request->eventID;

        $rate->name = $request->name;
        $rate->description = $request->description;
        $rate->price = $request->price;
        $rate->max_allowed_per_purchase = $request->maxAllowed;
        $rate->min_allowed_per_purchase = $request->minAllowed;
        $rate->quantity_available = $request->quantity;
        $rate->quantity_sold = 0;

        $rate->sales_start_date = Helpers::getDateTimeFormat($request->rateStartDate);
        $rate->sales_end_date = Helpers::getDateTimeFormat($request->rateEndDate);

        $rate->is_paused = false;
        $rate->absorb_fees = $request->absorb;
        $rate->save();

        return $rate;
    }
}
