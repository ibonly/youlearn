<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
    /**
     * Test Registration Page LoadsCorrectly
     */
    public function testRegistrationPageLoadsCorrectly ()
    {
        $this->call('GET', '/register');

        $this->assertResponseOk();
    }

    /**
     * Test User registration
     */
    public function testSuccessfulRegistration ()
    {
        $this->visit('/register')
             ->see('Registration Form')
             ->type('testuser', 'username')
             ->type('email@test.com', 'email')
             ->type('testpassword', 'password')
             ->press('Sign Up')
             ->seeInDatabase('users',['username' =>'testuser']);
    }
}
