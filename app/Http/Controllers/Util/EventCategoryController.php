<?php

namespace App\Http\Controllers\Util;

use App\Models\Util\EventCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventCategoryController extends Controller
{
    public function index()
    {
        $categories = EventCategory::all();

        return $categories;
    }
}
