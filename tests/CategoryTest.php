<?php

use YouLearn\Category;
use YouLearn\Http\Controllers\CategoryController;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
    use YouLearn\Test\CreateTrait;

    protected $category;

    public function __construct()
    {
        $this->category = new CategoryController();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testVideoCategory()
    {
        $this->createCategory();
        $this->createVideo();

        $this->visit('/category/Test-Category')
             ->see('View');
    }
}
