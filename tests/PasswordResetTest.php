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

    public function testGetResetPageError()
    {
        $password = new PasswordController();

        $this->setExpectedException('\Symfony\Component\HttpKernel\Exception\NotFoundHttpException');
        $password->getResetPage();
    }
}
