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

        $event->small_title = $request->small_title;
        $event->small_image = $request->small_image != null ? Helpers::uploadImage($request, 'small-images' ,'small_image') : $event->small_image;

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

        $event->cover_image = $request->coverImage != null ? Helpers::uploadImage($request, 'cover-images' ,'coverImage') : $event->cover_image;
        $event->bg_cover_image = $request->coverImage != null ? Helpers::makeBlurredImage($request, 'cover-images', 'coverImage') : $event->bg_cover_image;

        $event->description = $request->description;
        $event->location = $request->location;
        $event->status = $request->status;
        $event->listing = $request->listing;
        $event->is_featured = $request->featured;
        $event->start_date = Helpers::getDateTimeFormat($request->startDate);
        $event->end_date = Helpers::getDateTimeFormat($request->endDate);
        $event->on_sale_date = Helpers::getDateTimeFormat($request->onSaleDate);
        $event->price = $request->price;

        $event->small_title = $request->small_title;
        $event->small_image = $request->small_image != null ? Helpers::uploadImage($request, 'small-images' ,'small_image') : $event->small_image;

        $event->updated_at = Carbon::now();

        $event->save();
    }

    public static function listBasedOnCategory($events, $categoryID)
    {
        return $events->where('event_category_id', '=', $categoryID);
    }

    public static function eligibleEvents(Collection $events)
    {
        $eligibleEvents = [];

        foreach ($events as $event) {
            $eventOnSaleDate = Carbon::parse($event->on_sale_date);
            $eventEndDate = Carbon::parse($event->end_date);
            if ($eventEndDate->gt(Carbon::now()) && $eventOnSaleDate->lt(Carbon::now()) && $event->status == 1) {
                array_push($eligibleEvents, $event);
            }
        }

        return collect($eligibleEvents);
    }
}
