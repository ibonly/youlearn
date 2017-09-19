<?php

namespace YouLearn\Http\Controllers\Auth;

use YouLearn\User;
use YouLearn\Category;
use Illuminate\Mail\Message;
use Illuminate\Http\Request;
use YouLearn\Password_Reset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use YouLearn\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Load a password reset page.
     *
     * @param none
     * @return \Illuminate\Http\Response
     */
    public function passwordPage()
    {
        $recent = $this->recentVideos();
        $categories = $this->getCategory();

        return view('pages.passwordreset', compact('categories', 'recent'));
    }

    /**
     * postEmailForm
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function postEmailForm(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
        $response = [];

        //check if email exist (ajax call)
        $status = User::whereEmail($request->only('email'))->first();
        if ($status == false) {
            return $response =
            [
                "message"       => "Invalid",
                "status_code"   => 400,
            ];
        } else {
            $response = Password::sendResetLink($request->only('email'), function (Message $message) {
                $message->subject($this->getEmailSubject());
            });

            switch ($response) {
                case Password::RESET_LINK_SENT:
                    return redirect()->back()->with('status', trans($response));

                case Password::INVALID_USER:
                    return redirect()->back()->withErrors(['email' => trans($response)]);
            }
        }
    }

    /**
     * getResetPage
     *
     * @param  $token
     * @return \Illuminate\Http\Response
     */
    public function getResetPage($token = null)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }

        $recent = $this->recentVideos();
        $categories = $this->getCategory();
        $data = Password_Reset::whereToken($token)->first();

        return view('pages.newpassword', compact('categories', 'recent'))->with(['token' => $token, 'email' => $data->email]);
    }

    /**
     * postResetCheckEmail
     *
     * @param  Request $request
     * @return Json
     */
    public function postResetCheckEmail(Request $request)
    {
        $status = Password_Reset::whereEmail($request->only('email'))->first();
        $response = [];

        if ($status === null) {
            $response =
            [
                "message"       => "Invalid",
                "status_code"   => 401,
            ];
        } else {
            $credentials = $request->only(
                'email', 'password', 'password_confirmation', 'token'
            );
            $response = Password::reset($credentials, function ($user, $password) {
               $this->resetPassword($user, $password);
            });
        }

        return $response;
    }
}
