<?php

namespace YouLearn\Http\Controllers;

use Auth;
use Cloudder;
use YouLearn\User;
use YouLearn\Video;
use YouLearn\Avatar;
use YouLearn\Category;
use YouLearn\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Database\QueryException;
use YouLearn\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $response;

    /**
     * Load edit page
     */
    public function editPage(Request $request)
    {
        $users = $request->user();
        $categories = $this->getCategory();

        return view('pages.useredit', compact('categories', 'users'));
    }

    /**
     * Insert avatar details to database
     *
     * @param  Request $request
     */
    public function uploadAvatar(Request $request)
    {
        $imageURL = $this->getImageFileUrl($request->avatar);
        Avatar::where('user_id', $request->user_id)->update(['avatarURL' => $imageURL]);

        return redirect('/user/details');
    }

    /**
     * Get the videos uploaded by a particular use
     *
     * @param  $id
     */
    public function myVideos(Request $request)
    {
        $videos = Video::where('user_id', $request->user()->id)->orderBy('created_at', 'asc')->paginate(9);
        $categories = $this->getCategory();

        return view('pages.videos', compact('videos', 'categories'));
    }

    /*
    * Uploads avatar image to cloudinary
    *
    * @return url
    */
    protected function getImageFileUrl($avatar)
    {
        Cloudder::upload($avatar, null);
        $avatarUrl = Cloudder::getResult()['url'];

        return $avatarUrl;
    }

    /**
     * Update user details
     *
     * @param  $request
     *
     * @return json
     */
    public function userUpdate(Request $request)
    {
        $update = User::where('username', $request->user()->username)->update(['email' => $request->email,'password' => bcrypt($request->password)]);

        if ($update) {
            $this->response = [
                "message"     => "Update successful, you will be logged out",
                "status_code" => 202,
                "url"         => "/logout"
            ];
        } else {
            $this->response = [
                "message"     => "Cannot update",
                "status_code" => 400
            ];
        }

        return $this->response;
    }
}
