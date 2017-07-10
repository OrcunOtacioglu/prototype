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

    public static function createNew(Attendee $attendee)
    {
        $order = new Order();
        $order->reference = str_random(6);
        $order->attendee_id = $attendee->id;
        $order->transaction_id = random_int(100000, 999999);
        $order->status = 1;
        $order->total = Cart::total();
        $order->currency = 949;
        $order->created_at = Carbon::now('Europe/Istanbul');
        $order->updated_at = Carbon::now('Europe/Istanbul');
        $order->save();
        OrderItem::createItems($order);
    }
}
