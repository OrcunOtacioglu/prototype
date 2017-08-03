<?php

namespace App\Http\Controllers\Util;

use App\Models\Util\EventCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventCategoryController extends Controller
{
    /**
     * Shows all EventCategories.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        $categories = EventCategory::all();

        return $categories;
    }
}
