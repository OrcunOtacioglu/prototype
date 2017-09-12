<?php

namespace App\Http\Controllers\Util;

use Acikgise\Helpers\Helpers;
use App\Models\Util\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('dashboard.management.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.management.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page();
        $page->title = $request->title;
        $page->slug = Helpers::sluggify($request->title);
        $page->content = $request->pageContent;
        $page->created_at = Carbon::now('Europe/Istanbul');
        $page->updated_at = Carbon::now('Europe/Istanbul');
        $page->save();

        return redirect()->action('Util\PageController@edit', ['id' => $page->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $page = Page::where('slug', '=', $slug)->first();

        return view('frontend.page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);

        return view('dashboard.page.edit', compact('page'));
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
        $page = Page::find($id);
        $page->title = $request->title;
        $page->slug = Helpers::sluggify($request->title);
        $page->content = $request->pageContent;
        $page->updated_at = Carbon::now('Europe/Istanbul');
        $page->save();

        return redirect()->action('Util\PageController@edit', ['id' => $page->id]);
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
