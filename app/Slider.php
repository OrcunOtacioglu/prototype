<?php

namespace App;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';

    protected $fillable = [
        'event_id',
        'img_path',
        'x-placement',
        'y-placement',
        'x-offset',
        'y-offset'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
