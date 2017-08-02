<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    protected $table = 'payment_gateways';

    protected $fillable = [
        'provider_name',
        'test_url',
        'production_url',
        'is_active',
        'default_config'
    ];

    public function accounts()
    {
        return $this->belongsToMany(Account::class, 'account_payment_gateways', 'account_id', 'payment_gateway_id');
    }
}
