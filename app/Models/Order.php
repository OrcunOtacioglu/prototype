<?php

namespace App\Models;

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
}
