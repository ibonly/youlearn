<?php

namespace YouLearn\Http\Controllers;

use YouLearn\Video;
use YouLearn\Category;
use YouLearn\Http\Requests;
use Illuminate\Http\Request;
use YouLearn\Http\Controllers\Controller;
use YouLearn\Exceptions\EmptyFieldException;

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
        $search = $request->search;
        try{
            if (empty(trim($search)) ) {
                throw new EmptyFieldException();
            }
            $recent = $this->recentVideos();
            $categories = Category::orderBy('name', 'asc')->get();
            $videos = Video::where('title', 'ILIKE', '%'. $search .'%')->paginate(9);

            return view('pages.search', compact('videos', 'categories', 'recent'));
        } catch (EmptyFieldException $e) {
            return view('errors.404');
        }
    }
}
