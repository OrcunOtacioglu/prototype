<?php

namespace App\Models\Util;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $table = 'event_categories';

    protected $fillable = ['name'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public static function getCategories()
    {
        $categories = EventCategory::all();

        return $categories;
    }
}
