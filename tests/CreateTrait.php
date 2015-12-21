<?php

namespace YouLearn\Test;

use YouLearn\User;
use YouLearn\Video;
use YouLearn\Avatar;
use YouLearn\Category;

trait CreateTrait
{
    /**
     * Create test user
     *
     * @return \Illuminate\Support\Collection
     */
    public function createUser()
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
     *
     * @return \Illuminate\Support\Collection
     */
    public function createAvatar()
    {
        Avatar::create([
            'user_id'   => 1,
            'avatarURL' => 'asdada'
        ]);
    }

    /**
     * Create Category
     *
     * @return \Illuminate\Support\Collection
     */
    public function createCategory()
    {
        Category::create([
            'name' => 'Test Category'
        ]);
    }

    /**
     * Create Video
     *
     * @return \Illuminate\Support\Collection
     */
    public function createVideo()
    {
        Video::create([
            'user_id'     => 1,
            'category_id' => 1,
            'title'       => 'Test-Title',
            'url'         => 'sample video',
            'description' => 'Sample video description',
            'slug'        => 'Test-Title'
        ]);
    }
}