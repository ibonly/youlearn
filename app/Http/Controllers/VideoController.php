<?php

namespace YouLearn\Http\Controllers;

use YouLearn\Video;
use YouLearn\Avatar;
use YouLearn\Category;
use Illuminate\Support\Str;
use YouLearn\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use YouLearn\Http\Controllers\Controller;

class VideoController extends Controller
{
    protected $video;
    protected $response;

    /**
     * Load video upload page
     *
     * @param  none
     * @return \Illuminate\Http\Response
     */
    public function uploadPage()
    {
        $recent = $this->recentVideos();
        $categories = $this->getCategory();

        return view('pages.upload', compact('categories', 'recent'));
    }

    /**
     * Load play video page
     *
     * @param  $title
     * @return \Illuminate\Http\Response
     */
    public function playVideo($title)
    {
        $recent = $this->recentVideos();
        $categories = $this->getCategory();
        $video = Video::where('slug', $title)->first();
        $avatar = Avatar::whereUser_id($video->user_id)->first();
        $video->avatar = $avatar->avatarURL;

        return view('pages.play', compact('categories', 'video', 'recent'));
    }

    /**
     * Load update video upload page
     *
     * @param  $title
     * @return \Illuminate\Http\Response
     */
    public function updatePage($title)
    {
        $recent = $this->recentVideos();
        $categories = $this->getCategory();
        $video = Video::where('slug', $title)->first();

        return view('pages.updateVideo', compact('categories', 'video', 'recent'));
    }

    /**
     * Get video ID from the URL
     *
     * @param  $url
     * @return  int
     */
    public function getVideoId($url)
    {
        $videoId = "";
        $getID = explode('=', $url);

        if (count($getID) > 1) {
            $videoId = $getID[1];
        } else {
            $videoId = $url;
        }

        return $videoId;
    }

    /**
     * Insert video
     *
     * @param  Request $request     *
     * @return json
     */
    public function uploadVideo(Request $request)
    {
        try {
            Video::create([
                'user_id'       => $request->user_id,
                'category_id'   => $request->category_id,
                'title'         => $request->title,
                'url'           => $this->getVideoId($request->url),
                'description'   => $request->description,
                'slug'          => Str::slug($request->title)
            ]);
            $this->response = [
                "message"     => "Video uploaded successfully",
                "status_code" => 202,
                "url"         => "/video/upload"
            ];
        } catch (QueryException $e) {
            $this->response = [
                "message"     => "Error uploading video",
                "status_code" => 400
            ];
        }

        return $this->response;
    }

    /**
     * Update video details
     *
     * @param  Request $request     *
     * @return json
     */
    public function editVideo(Request $request)
    {
        $update = Video::whereId($request->video_id)->update(['title' => $request->title, 'category_id' => $request->category_id, 'description' => $request->description, 'slug' => Str::slug($request->title)]);

        if ($update) {
            $this->response = [
                "message"     => "Video updated successfully",
                "status_code" => 202,
                "url"         => "/user/videos"
            ];
        } else {
            $this->response = [
                "message"     => "Error Updating video",
                "status_code" => 400
            ];
        }

        return $this->response;
    }

    /**
     * Delete video
     *
     * @param  $id      *
     * @return json
     */
    public function deleteVideo($id)
    {
        $deleteVideo = Video::where('id', $id)->delete();

        if ($deleteVideo) {
            $this->response =
            [
                "message"       => "Video deleted successfully",
                "status_code"   => 202,
                "url"           => "/"
            ];
        } else {
            $this->response =
            [
                "message"       => "Unable to delete Video",
                "status_code"   => 400
            ];
        }

        return $this->response;
    }
}