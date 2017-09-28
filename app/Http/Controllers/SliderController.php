<?php

namespace App\Http\Controllers;

use Acikgise\Helpers\Helpers;
use App\Models\Event;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $slides = Slider::all();

        return view('dashboard.management.slider.index', compact('slides'));
    }

    public function create()
    {
        $events = Event::all();

        return view('dashboard.management.slider.create', compact('events'));
    }

    public function store(Request $request)
    {
        $slider = new Slider();

        $slider->event_id = $request->event_id;
        $slider->img_path = Helpers::uploadImage($request, 'slider-images', 'slider_bg');
        $slider->x_placement = $request->x_placement;
        $slider->y_placement = $request->y_placement;
        $slider->x_offset = $request->x_offset;
        $slider->y_offset = $request->y_offset;

        $slider->created_at = Carbon::now();
        $slider->updated_at = Carbon::now();

        $slider->save();

        return redirect()->action('SliderController@index');
    }

    public function edit($id)
    {
        $slider = Slider::find($id);

        return view('dashboard.management.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);

        $slider->event_id = $request->event_id;
        $slider->img_path = $request->slider_bg != null ?
            Helpers::uploadImage($request, 'slider-images', 'slider_bg') : $slider->img_path;
        $slider->x_placement = $request->x_placement;
        $slider->y_placement = $request->y_placement;
        $slider->x_offset = $request->x_offset;
        $slider->y_offset = $request->y_offset;

        $slider->updated_at = Carbon::now();

        $slider->save();

        return redirect()->action('SliderController@index');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);

        $slider->delete();

        return redirect()->back();
    }
}
