<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'payment_gateways';

    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = [
        'provider_name',
        'test_url',
        'production_url',
        'is_active',
        'default_config'
    ];

    /**
     * Returns all related Accounts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function accounts()
    {
        return $this->belongsToMany(Account::class, 'account_payment_gateways', 'account_id', 'payment_gateway_id');
    }
}
