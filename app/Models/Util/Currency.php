<?php

namespace App\Models\Util;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'currencies';

    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'symbol',
        'name',
        'code'
    ];
}
