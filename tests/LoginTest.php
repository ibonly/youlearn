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
     *
     * @return void
     */
    public function testLoginPageLoadsCorrectly()
    {
        $this->call('GET', '/login');

        $this->assertResponseOk();
    }

    /**
     * Test User successful login
     *
     * @return void
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
     *
     * @return void
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

    /**
     * Test see Password reset link
     */
    public function testSeePasswordResetLink()
    {
        $this->visit('/')
            ->see('Login')
            ->click('Login')
            ->see('Please sign in')
            ->click('Forgot Your Password')
            ->see('Reset your password');
    }

    /**
     * Test see Password reset link
     */
    public function testSeeRegistrationLink()
    {
        $this->visit('/')
            ->see('Login')
            ->click('Login')
            ->see('Please sign in')
            ->click('Sign Up')
            ->see('Registration Form');
    }
}
