<?php

use YouLearn\User;
use YouLearn\Video;
use YouLearn\Avatar;
use YouLearn\Category;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VideoTest extends TestCase
{
    /**
     * Create test user
     */
    public function createUser ()
    {
        return User::create([
            'username'   => 'testuser',
            'email'      => 'email@test.com',
            'password'   => bcrypt('testpassword'),
            'facebookID' => 0,
            'twitterID'  => 0,
            'githubID'   => 0
        ]);
    }

    /**
     * Create Avatar
     */
    public function createAvatar ()
    {
        Avatar::create([
            'user_id' => 1,
            'avatarURL' => 'asdada'
        ]);
    }

    /**
     * Create Category
     */
    public function createCategory ()
    {
        Category::create([
            'name' => 'Test Category'
        ]);
    }

    /**
     * Create Video
     */
    public function createVideo ()
    {
        Video::create([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'Test Title',
            'url' => 'sample video',
            'description' => 'Sample video description'
        ]);
    }

    /**
     * Test video upload
     */
    public function testUploadSuccessful ()
    {
        $user = $this->createUser();

        $this->createCategory();
        $this->createAvatar();

        Auth::login($user);

        $this->visit('/video/upload')
             ->see('Video Upload')
             ->type(1, 'user_id')
             ->select(1, 'category_id')
             ->type('Test Title', 'title')
             ->type('youtube_video', 'url')
             ->press('Submit');
    }
}
