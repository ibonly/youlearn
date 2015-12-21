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
             ->press('Submit')
             ->seeInDatabase('videos', ['title' => 'Test Title']);
    }

    /**
     * Test video upload
     *
     * @return void
     */
    public function testVideoUploadError()
    {
        $user = $this->createUser();

        $this->createCategory();
        $this->createAvatar();

        Auth::login($user);

        $this->visit('/video/upload')
             ->see('Video Upload')
             ->type('Test Title', 'title')
             ->type('youtube_video', 'url')
             ->press('Submit')
             ->notSeeInDatabase('videos', ['title' => 'Test Title']);
    }

    public function testEditVideo()
    {
        $user = $this->createUser();

        $this->createCategory();
        $this->createAvatar();

        Auth::login($user);

        $this->put('/video/Test-title/edit', ['title' => 'New Title'], ['text/html']);

        $this->assertResponseStatus(500);
    }
}
