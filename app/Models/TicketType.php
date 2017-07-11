<?php

namespace App\Models;

use Acikgise\Helpers\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
