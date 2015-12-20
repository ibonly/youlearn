<?php

namespace YouLearn\Http\Controllers;

use YouLearn\Video;
use YouLearn\Category;
use YouLearn\Http\Requests;
use Illuminate\Http\Request;
use YouLearn\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Index/home page
     */
    public function homePage(Request $request)
    {
        $recent = $this->recentVideos();
        $categories = $this->getCategory();
        $videos = Video::orderBy('id', 'asc')->paginate(9);

        return view('pages.home', compact('categories', 'videos', 'recent'));
    }
}
