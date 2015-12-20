<?php

namespace YouLearn\Http\Controllers;

use YouLearn\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Get all categories in ascending order
     * @return [type] [description]
     */
    public function getCategory()
    {
        return Category::orderBy('name', 'asc')->get();
    }
}
