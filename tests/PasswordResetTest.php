<?php

use YouLearn\User;
use YouLearn\Password_Reset;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use YouLearn\Http\Controllers\Auth\PasswordController;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    /**
     * @covers class::()
     */
    public function testPasswordResetFOrm()
    {
        $this->createUser();

        $this->visit('/')
             ->click('Login')
             ->seePageIs('/login')
             ->click('Forgot Your Password')
             ->seePageIs('/passwordreset')
             ->type('ib1@gmail.com', 'email')
             ->press('submit_reset')
             ->see('{"message":"Invalid","status_code":400}');
    }

    public function testGetResetPageError()
    {
        $password = new PasswordController();

        $this->setExpectedException('\Symfony\Component\HttpKernel\Exception\NotFoundHttpException');
        $password->getResetPage();
    }
}
