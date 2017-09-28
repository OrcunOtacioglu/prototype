<?php

namespace App\Models\Util;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'site_settings';

    protected $fillable = [
        'default_payment_processor_id',
        'site_title',
        'currency_code',
        'google_analytics_code'
    ];
}
