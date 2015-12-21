<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PasswordResetTest extends TestCase
{
    use YouLearn\Test\CreateTrait;

    /**
     * test See PasswordReset Page
     *
     * @return void
     */
    public function testSeePasswordResetPage()
    {
        $this->visit('/')
             ->click('Login')
             ->seePageIs('/login')
             ->click('Forgot Your Password')
             ->seePageIs('/passwordreset');
    }

}
