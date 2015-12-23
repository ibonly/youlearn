<?php

namespace YouLearn\Http\Controllers;

use Exception;
use YouLearn\Video;
use YouLearn\Category;
use YouLearn\Http\Requests;
use Illuminate\Http\Request;
use YouLearn\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Insert category into database
     *
     * @param  Request $request
     * @return \Illuminate\Support\Collection
     */
    public function create(Request $request)
    {
        return Category::create([
            'name' => $request->name
        ]);
    }

    /**
     * Get videos in a particular category
     *
     * @param  $name
     * @return \Illuminate\Http\Response
     */
    public function getVideoInCategory($name)
    {
        try {
            $recent = $this->recentVideos();
            $categories = $this->getCategory();
            $category = Category::where('name', 'ILIKE', $name)->first();
            $videos = Video::where('category_id', $category->id)->orderBy('created_at', 'desc')->paginate(9);

            return view('pages.category', compact('videos', 'categories', 'recent'));
        } catch (Exception $e) {
            return view('errors.404');
        }
    }
}
