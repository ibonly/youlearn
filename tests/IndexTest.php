<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexTest extends TestCase
{
    use YouLearn\Test\CreateTrait;

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
     * Test Home Page LoadsCorrectly
     *
     * @return void
     */
    public function testHomePageLoadsCorrectly()
    {
        $this->call('GET', '/');

        $this->assertResponseOk();
    }

    /**
     * Test visit home page
     *
     * @return void
     */
    public function testHomePage()
    {
        $this->visit('/')
             ->see('Welcome to YouLearn');
    }

    /**
     * Test Load Registration Page
     *
     * @return void
     */
    public function testSeeRegistrationPage()
    {
        $this->visit('/')
             ->click('Register')
             ->see('Registration Form');
    }

    /**
     * Test Load Load Page
     *
     * @return void
     */
    public function testSeeLoginPage()
    {
        $this->visit('/')
             ->click('Login')
             ->see('Please sign in');
    }

    // public function testSearch()
    // {
    //     $user = $this->createUser();

    //     $this->createCategory();
    //     $this->createAvatar();

    //     Auth::login($user);

    //     $this->post('/search', ['Test'], ['text/HTML']);

    //     $this->assertResponseOk();
    // }

    /**
     * Test load dashboard
     *
     * @return void
     */
    public function testLoadDashboard()
    {
        $this->visit('/login')
             ->see('Please sign in')
             ->type('testuser', 'username')
             ->type('testpassword', 'password')
             ->press('Sign In');

        $this->call('GET', '/');

        $this->assertResponseOk();
    }

    public function testLogout()
    {
        $user = $this->createUser();

        $this->createCategory();
        $this->createAvatar();

        Auth::login($user);

        $this->visit('/')
             ->see('Logout')
             ->click('Logout');

        $this->assertResponseOk();
    }
}
