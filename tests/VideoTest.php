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
    use YouLearn\Test\CreateTrait;

    /**
     * Test video upload
     *
     * @return void
     */
    public function testUploadSuccessful()
    {
        $this->login();

        $this->visit('/video/upload')
             ->see('Video Upload')
             ->type(1, 'user_id')
             ->select(1, 'category_id')
             ->type('Test Title', 'title')
             ->type('youtube_video', 'url')
             ->press('Submit')
             ->seeInDatabase('videos', ['title' => 'Test Title']);
    }

    /**
     * Test User cannot edit video
     *
     * @return void
     */
    public function testCannotEditVideo()
    {
        $this->put('/video/Test-title/edit', ['title' => 'New Title'], ['text/html']);

        $this->assertResponseStatus(500);
    }

    /**
     * test Play Video
     *
     * @return void
     */
    public function testPlayVideoPage()
    {
        $this->login();

        $this->visit('/')
             ->see('VIEW')
             ->click('view')
             ->see('Created on');
    }

    /**
     *
     */
    public function testUserVideo()
    {
        $this->login();

        $this->visit('/user/videos')
             ->see('EDIT');

        $this->assertViewHas('videos');
    }

    /**
     * Test video edit
     *
     * @return void
     */
    public function testEditVideo()
    {
        $this->login();

        $this->visit('/user/videos')
             ->click('EDIT')
             ->type('Latest Title', 'title')
             ->press('Update')
             ->seeInDatabase('videos', ['title' => 'Latest Title']);
    }

    /**
     * Test play video
     *
     * @return void
     */
    public function testPlayVideo()
    {
        $this->login();

        $this->visit('/')
             ->click('view')
             ->see('Uploaded by');

        $this->assertViewHas('video');
    }
}
