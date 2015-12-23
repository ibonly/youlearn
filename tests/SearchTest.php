<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SearchTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * Test Search
     *
     * @return void
     */
    public function testSearchRouteLoadsCorrectly()
    {
        Session::start();
        $credentials = [
            '_token' => csrf_token(),
            'search' => 'languages',
        ];
       $this->call('POST', 'search', $credentials);
    }

    /**
     * Test if empty data is passed to search
     *
     * @return void
     */
    public function testEmptySearchRouteLoadsCorrectly()
    {
        $credentials = [
            '_token' => csrf_token(),
            'search' => '',
        ];
       $this->call('POST', 'search', $credentials);
    }
}
