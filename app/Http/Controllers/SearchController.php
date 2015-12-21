<?php

namespace YouLearn\Http\Controllers;

use YouLearn\Video;
use YouLearn\Category;
use YouLearn\Http\Requests;
use Illuminate\Http\Request;
use YouLearn\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $recent = $this->recentVideos();
        $categories = Category::orderBy('name', 'asc')->get();
        $videos = Video::where('title', 'ILIKE', '%'. $request->search .'%')->paginate(9);

        return view('pages.search', compact('videos', 'categories', 'recent'));
    }

}
