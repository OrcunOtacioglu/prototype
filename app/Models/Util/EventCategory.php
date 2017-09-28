<?php

namespace App\Models\Util;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'event_categories';

    public $timestamps = 'false';

    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Return Event resources under the given Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Return all Event Categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getCategories()
    {
        $categories = EventCategory::all();

        return $categories;
    }
}
