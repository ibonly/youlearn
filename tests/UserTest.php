<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use YouLearn\Test\CreateTrait;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * Test User Avatar Relationship
     */
    public function testUserAvatarRelationship()
    {
        $user = $this->createUser();
                $this->createAvatar();

        $this->assertEquals($user->id, $user->avatar->user_id);
    }

    /**
     * Test User Video Relationship
     */
    public function testUserVideoRelationship()
    {
        $user = $this->createUser();
                $this->createCategory();
        $video = $this->createVideo();

        $this->assertEquals($video->user_id, $video->user->id);
    }

    /**
     * Test user profile
     *
     * @return void
     */
    public function testUserProfile()
    {
        $this->login();

        $this->visit('/')
             ->see('My Profile')
             ->click('My Profile')
             ->see('Update Information');
    }

    /**
     * Test upload avatar
     *
     * @return void
     */
    public function testUploadAvatar()
    {
        $this->login();
        $this->visit('/user/details');

        $this->post('/user/avatar', ['avatar' => '/public/images/avatar.jpg']);
    }

    /**
     * Test Update user details
     *
     * @return void
     */
    public function testProfileUpdate()
    {
        $this->login();
        $this->visit('/user/details')
             ->type('newemail@email.com', 'email')
             ->type('newpassword', 'password')
             ->press('Update')
             ->seeInDatabase('users', ['email' => 'newemail@email.com']);
    }

    /**
     * @covers class::()
     */
    public function testEmptyInputUpdate()
    {
        $this->login();
        $this->visit('/user/details')
             ->type('newemail@email.com', 'email')
             ->type('', 'password')
             ->press('Update')
             ->see('{"message":"Input field is empty","status_code":400}');
    }

    /**
     * Test view has user's video
     *
     * @return void
     */
    public function testUserVideo()
    {
        $this->login();

        $this->visit('user/videos')
             ->see('My Videos');

        $this->assertViewHas('videos');
    }
}
