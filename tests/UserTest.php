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
}
