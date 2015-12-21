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
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function editPage(Request $request)
    {
        $users = $request->user();
        $recent = $this->recentVideos();
        $categories = $this->getCategory();

        return view('pages.useredit', compact('categories', 'users', 'recent'));
    }

    /**
     * Insert avatar details to database
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
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
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function myVideos(Request $request)
    {
        $recent = $this->recentVideos();
        $categories = $this->getCategory();
        $videos = Video::where('user_id', $request->user()->id)->orderBy('created_at', 'desc')->paginate(9);

        return view('pages.videos', compact('videos', 'categories', 'recent'));
    }

    /**
    * Uploads avatar image to cloudinary
    *
    * @param $avatat
    * @return  string
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
     * @param  $request     *
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
