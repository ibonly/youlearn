<?php

use YouLearn\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    use YouLearn\Test\CreateTrait;

    /**
     * Test Login Page LoadsCorrectly
     */
    public function testLoginPageLoadsCorrectly()
    {
        $this->call('GET', '/login');

        $this->assertResponseOk();
    }

    /**
     * Test User successful login
     */
    public function testSuccessfulLogin()
    {
        $this->createUser();

        $this->visit('/login')
             ->see('Please sign in')
             ->type('testuser', 'username')
             ->type('testpassword', 'password')
             ->press('Sign In')
             ->see('{"message":"login successful","status_code":201}');
    }

    /**
     * Test invalid login details
     */
    public function testInvalidLogin()
    {
        $this->createUser();

        $this->visit('/login')
             ->see('Please sign in')
             ->type('username', 'username')
             ->type('password', 'password')
             ->press('Sign In')
             ->see('{"message":"login failed","status_code":400}');
    }
}
