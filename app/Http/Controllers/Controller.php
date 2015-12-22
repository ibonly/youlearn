<?php

namespace YouLearn\Http\Controllers;

use YouLearn\Video;
use YouLearn\Category;
use YouLearn\Exceptions\EmptyFieldException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Get all categories in ascending order
     *
     * @param  none
     * @return \Illuminate\Support\Collection
     */
    public function getCategory()
    {
        return Category::orderBy('name', 'asc')->get();
    }

    /**
     * Get 5 most recent videos added
     *
     * @param  none
     * @return \Illuminate\Support\Collection
     */
    public function recentVideos()
    {
        return Video::orderBy('created_at', 'desc')->limit(5)->get();
    }

    public function cleanValue($value)
    {
            if (empty(trim($value)) || trim($value) == "") {
                return true;
            }

            return $value;

    }
}
