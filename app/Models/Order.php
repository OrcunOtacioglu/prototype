<?php

namespace App\Models;

use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'reference',
        'attendee_id',
        'transaction_id',
        'status',
        'total',
        'currency'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function attendee()
    {
        return $this->belongsTo(Attendee::class, 'attendee_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public static function createNew(Attendee $attendee, $eventID)
    {
        $order = new Order();
        $order->reference = str_random(6);
        $order->attendee_id = $attendee->id;
        $order->event_id = $eventID;
        $order->transaction_id = random_int(100000, 999999);
        $order->status = 1;
        $order->total = Cart::total();
        $order->currency = 949;
        $order->created_at = Carbon::now('Europe/Istanbul');
        $order->updated_at = Carbon::now('Europe/Istanbul');
        $order->save();
        OrderItem::createItems($order);

        return $order;
    }

    public static function updateOrder($orderID)
    {
        $order = Order::find($orderID);

        //@TODO Compare Cart Items with the Order Items. Add the additional resources into the Order.
    }
}
