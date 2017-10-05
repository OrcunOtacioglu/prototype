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

        return view('dashboard.event.category.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.event.category.create');
    }

    public function store(Request $request)
    {
        $category = new EventCategory();

        $category->name = $request->name;
        $category->save();

        return redirect()->action('Util\EventCategoryController@index');
    }

    public function edit($id)
    {
        $category = EventCategory::find($id);

        return view('dashboard.event.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = EventCategory::find($id);

        $category->name = $request->name;
        $category->save();

        return redirect()->action('Util\EventCategoryController@edit', ['id' => $category->id]);
    }

    public function destroy($id)
    {
        $category = EventCategory::find($id);
        $category->delete();

        return redirect()->action('Util\EventCategoryController@index');
    }
}
