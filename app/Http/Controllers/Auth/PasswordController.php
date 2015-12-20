<?php

namespace YouLearn\Http\Controllers\Auth;

use YouLearn\User;
use YouLearn\Category;
use YouLearn\PasswordReset;
use Illuminate\Mail\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use YouLearn\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

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
     * Load the password reset page
     */
    public function getEmailPage()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        return view('pages.passwordreset', compact('categories'));
    }

    /**
     * Load a password reset page.
     */
    public function passwordPage()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        return view('pages.passwordreset', compact('categories'));
    }

    /**
     * postEmailForm
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
            //Send the reset link
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
     */
    public function getResetPage($token = null)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }

        $data = PasswordReset::whereToken($token)->first();
        $categories = Category::orderBy('name', 'asc')->get();

        return view('pages.newpassword', compact('categories'))->with(['token' => $token, 'email' => $data->email]);
    }

    /**
     * postResetCheckEmail
     */
    public function postResetCheckEmail(Request $request)
    {
        $status = PasswordReset::whereEmail($request->only('email'))->first();
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
