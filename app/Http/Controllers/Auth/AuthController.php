<?php

namespace YouLearn\Http\Controllers\Auth;

use Auth;
use Validator;
use YouLearn\User;
use YouLearn\Avatar;
use YouLearn\Category;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use YouLearn\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $response;
    protected $redirectPath = "/home";
    protected $loginPath    = '/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Load login page
     */
    public function loginPage()
    {
        $categories = $this->getCategory();

        return view('pages.login', compact('categories'));
    }

    /**
     * Load registration page
     */
    public function registrationPage()
    {
        $categories = $this->getCategory();

        return view('pages.register', compact('categories'));
    }

    /**
     * Logout page
     *
     * @param  Request $request
     */
    public function getLogout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $request)
    {
        return User::create([
            'username'   => $request->username,
            'email'      => $request->email,
            'password'   => bcrypt($request->password),
            'facebookID' => 0,
            'twitterID'  => 0,
            'githubID'   => 0
        ]);
    }

    protected function createDefaultAvatar(Request $request)
    {

        $userID = User::where('username', $request->username)->first();
        Avatar::create([
            'user_id' => $userID->id,
            'avatarURL' => $request->avatar
        ]);
    }

    /**
     * User Registration
     */
    public function register(Request $request)
    {
        try {
            if (! empty($this->create($request))) {
                $this->createDefaultAvatar($request);
                $this->response =
                [
                    'message'     => "User registration successful",
                    'status_code' => 202,
                    'url'         => '/'
                ];
            }
        } catch (QueryException $e) {
            $this->response =
            [
                'message'     => "Invalid Details Provided",
                'status_code' => 400
            ];
        }
        return $this->response;
    }

    /**
     * User loging
     */
    public function postLogin(Request $request)
    {
        $login = Auth::attempt($request->only(['username', 'password']));

        if (! $login)
        {

            // $request->session()->put('user', Auth::user());
            $this->response =
            [
                "message"       => "login failed",
                "status_code"   => 400,
            ];
        }
        else
        {
            $this->response =
            [
                "message"       => "login successful",
                "status_code"   => 201,
            ];
        }

        return $this->response;
    }
}
