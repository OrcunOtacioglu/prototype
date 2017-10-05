<?php

namespace App\Http\Controllers;

use Acikgise\Helpers\Helpers;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FeaturedEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where('is_featured', '=', true)->get();

        return view('dashboard.event.featured.index', compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        return view('dashboard.event.featured.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        $event->featured_image = Helpers::uploadImage($request, 'featured-images', 'featured-image');
        $event->featured_title = $request->featured_title;
        $event->is_featured = $request->is_featured;

        $event->updated_at = Carbon::now();
        $event->save();

        return redirect()->action('FeaturedEventController@edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
