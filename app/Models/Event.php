<?php

namespace App\Models;

use App\Models\Finance\Invoice;
use App\Models\Util\EventCategory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Acikgise\Helpers\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * Tablename
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = [
        'account_id',
        'title',
        'slug',
        'description',
        'cover_image',
        'bg_cover_image',
        'location',
        'category',
        'type',
        'status',
        'listing',
        'is_featured',
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

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
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
        $event->bg_cover_image = Helpers::makeBlurredImage($request, 'cover-images', 'coverImage');
        $event->location = $request->location;
        $event->status = $request->status;
        $event->listing = $request->listing;
        $event->is_featured = $request->featured;
        $event->start_date = Helpers::getDateTimeFormat($request->startDate);
        $event->end_date = Helpers::getDateTimeFormat($request->endDate);
        $event->on_sale_date = Helpers::getDateTimeFormat($request->onSaleDate);
        $event->price = $request->price;

        $event->created_at = Carbon::now();
        $event->updated_at = Carbon::now();

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
        $event->bg_cover_image = Helpers::makeBlurredImage($request, 'cover-images', 'coverImage');
        $event->description = $request->description;
        $event->location = $request->location;
        $event->status = $request->status;
        $event->listing = $request->listing;
        $event->is_featured = $request->featured;
        $event->start_date = Helpers::getDateTimeFormat($request->startDate);
        $event->end_date = Helpers::getDateTimeFormat($request->endDate);
        $event->on_sale_date = Helpers::getDateTimeFormat($request->onSaleDate);
        $event->price = $request->price;

        $event->updated_at = Carbon::now();

        $event->save();
    }

    public static function listBasedOnCategory(Collection $events, $categoryID)
    {
        return $events->where('event_category_id', '=', $categoryID);
    }
}
