<?php

namespace App\Models;

use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'order_items';

    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_name',
        'quantity',
        'unit_price',
        'subtotal'
    ];

    /**
     * Creates OrderItems based on the Cart.
     *
     * @param Order $order
     */
    public static function createItems(Order $order)
    {
        foreach (Cart::content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;

            // @TODO Get Item properties from related database model.
            $orderItem->product_name = $item->name;
            $orderItem->quantity = $item->qty;
            $orderItem->unit_price = $item->price;
            $orderItem->subtotal = $item->qty * $item->price;
            $orderItem->created_at = Carbon::now('Europe/Istanbul');
            $orderItem->updated_at = Carbon::now('Europe/Istanbul');
            $orderItem->save();
        }
    }
}
