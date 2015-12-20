<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample ()
    {
        $this->assertTrue(true);
    }

    /**
     * Test Home Page LoadsCorrectly
     */
    public function testHomePageLoadsCorrectly ()
    {
        $this->call('GET', '/');

        $this->assertResponseOk();
    }

    /**
     * Test visit home page
     */
    public function testHomePage ()
    {
        $this->visit('/')
             ->see('Welcome to YouLearn');
    }

    /**
     * Test load dashboard
     */
    public function testLoadDashboard ()
    {
        $this->visit('/login')
             ->see('Please sign in')
             ->type('testuser', 'username')
             ->type('testpassword', 'password')
             ->press('Sign In');

        $this->call('GET', '/');

        $this->assertResponseOk();
    }
}
