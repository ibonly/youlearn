<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
    use YouLearn\Test\CreateTrait;

    /**
     * Test Registration Page LoadsCorrectly
     *
     * @return void
     */
    public function testRegistrationPageLoadsCorrectly()
    {
        $this->call('GET', '/register');

        $this->assertResponseOk();
    }

    /**
     * Test User registration
     *
     * @return void
     */
    public function testSuccessfulRegistration()
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
