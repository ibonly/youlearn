<?php

namespace YouLearn\Http\Controllers;

use Auth;
use Socialite;
use YouLearn\User;
use YouLearn\Avatar;
use YouLearn\Http\Requests;
use Illuminate\Http\Request;
use YouLearn\Http\Controllers\Controller;

class OauthController extends Controller
{
    /**
     * Get user id
     *
     * @param  $username
     */
    public function getUserID($username)
    {
        $user = User::whereUsername($username)->first();

        return $user->id;
    }

    /**
     * Create Avatar
     *
     * @param  $username
     * @param  $ur
     */
    public function createAvatar($username, $url)
    {
        return Avatar::create([
            'user_id' => $this->getUserID($username),
            'avatarURL' => $url
        ]);
    }

    /**
     * Social ouath login/registration
     *
     * @param  $request
     * @param  $provider
     *
     * @return  [object]
     */
    public function getSocialRedirect(Request $request, $provider )
    {
        if (!($request->has('code') || $request->has('oauth_token'))) {
            return Socialite::driver( $provider )->redirect();
        }

        $userData = $this->getOauth($provider);

        if ($this->checkUserExist($userData, $provider) === null) {
            return $this->socialFunction($userData, $provider);
        }

        $user = $this->findByIDorCreate($userData, $provider);
        Auth::login($user, true);

        return $this->userHasLoggedIn();
    }

    /**
     * checkUserExist Check if user details already
     *
     * @param  $value
     * @param  $provider
     *
     * @return [object]
     */
    public function checkUserExist($value, $provider)
    {
        $columnName  = $provider.'ID';
        $user = User::where($columnName, $value->getId())->orWhere('username', $value->getNickname())->orWhere('email', $value->getEmail())->first();

        return $user;
    }

    /**
     * getOauth Get the social account details
     *
     * @param  $provider
     *
     * @return [object]
     */
    public function getOauth($provider)
    {
        return Socialite::driver( $provider )->user();
    }

    /**
     * userHasLoggedIn Redirect to main page
     */
    public function userHasLoggedIn()
    {
        return redirect('/login');
    }

    /**
     * findByIDorCreate check if user already exist
     *
     * @param  $userData
     * @param  $provider
     *
     * @return [object]
     */
    public function findByIDorCreate($userData, $provider)
    {
        $columnName  = $provider.'ID';
        $user = $this->checkUserExist($userData, $provider);

        if ($user) {
            User::where('id', $user->id)->update([$columnName => $userData->getId()]);
            return $user;
        }
    }

    /**
     * socialFunction Get Social login type
     *
     * @param  $userData
     * @param  $provider
     */
    public function socialFunction($userData, $provider)
    {
        return $this->getSocialData($userData, $provider);
    }

    /**
     * getSocialData Pass the user details to signup form
     *
     * @param  $userData
     * @param  $provider
     */
    protected function getSocialData($userData, $provider)
    {
        $array = ['username' => $userData->getNickname(), 'email' => $userData->getEmail(), 'facebookID' => 0, 'twitterID' => 0, 'githubID'=> 0];
        $array[$provider.'ID'] = $userData->getId();

        if ($userData->getNickname() === null) {
            $array['username'] = $userData->getName();
        }

        $user = User::create($array);

        if ($user) {
            $this->createAvatar($array['username'], $userData->getAvatar());
            Auth::loginUsingId($user->id, true);

            return $this->userHasLoggedIn();
        }
    }
}
