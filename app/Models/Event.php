<?php

namespace App\Models;

use App\Models\Util\EventCategory;
use App\Models\Util\EventType;
use Illuminate\Http\Request;
use Acikgise\Helpers\Helpers;
use Illuminate\Support\Facades\Auth;
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

    public function eventCategory()
    {
        return $this->belongsTo(EventCategory::class);
    }

    public static function createNew(Request $request)
    {
        $event = new Event();
        $event->account_id = Auth::user()->account->id;
        $event->event_category_id = $request->category;
        $event->title = $request->title;
        $event->slug = Helpers::sluggify($request->title);
        $event->description = $request->description;
        $event->cover_image = Helpers::uploadImage($request, 'cover-images','coverImage');
        $event->location = $request->location;
        $event->status = $request->status;
        $event->listing = $request->listing;
        $event->start_date = Helpers::getDateTimeFormat($request->startDate);
        $event->end_date = Helpers::getDateTimeFormat($request->endDate);
        $event->on_sale_date = Helpers::getDateTimeFormat($request->onSaleDate);
        $event->save();

        return $event;
    }

    public static function updateEvent(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->event_category_id = $request->category;
        $event->title = $request->title;
        $event->slug = Helpers::sluggify($request->title);
        $event->cover_image = Helpers::uploadImage($request, 'cover-images' ,'coverImage');
        $event->description = $request->description;
        $event->location = $request->location;
        $event->status = $request->status;
        $event->listing = $request->listing;
        $event->start_date = Helpers::getDateTimeFormat($request->startDate);
        $event->end_date = Helpers::getDateTimeFormat($request->endDate);
        $event->on_sale_date = Helpers::getDateTimeFormat($request->onSaleDate);
        $event->save();
    }
}
