<?php

namespace YouLearn\Http\Controllers;

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
     */
    public function getVideoInCategory($name)
    {
        $category = Category::where('name', $name)->first();
        $videos = Video::where('category_id', $category->id)->orderBy('created_at', 'desc')->paginate(9);

        $categories = $this->getCategory();

        return view('pages.category', compact('videos', 'categories'));
    }
}
