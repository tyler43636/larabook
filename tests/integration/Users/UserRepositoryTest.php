<?php

use Laracasts\TestDummy\Factory as TestDummy;

class UserRepositoryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    /**
     * @var Larabook\Users\UserRepository
     */
    protected $repo;

    protected function _before()
    {
        $this->repo = $this->tester->grabService('Larabook\Users\UserRepository');
    }

    /** @test */
    public function paginateAllUsers()
    {
        TestDummy::times(4)->create('Larabook\Users\User');

        $results = $this->repo->getPaginated(2);

        $this->assertCount(2, $results);
    }

    /** @test */
    public function findUserByUsernameWithStatuses()
    {
        // Given
        $statuses = TestDummy::times(3)->create('Larabook\Statuses\Status');
        $username = $statuses[0]->user->username;

        // When
        $user = $this->repo->findByUsername($username);

        // Then
        $this->assertEquals($username, $user->username);
        $this->assertCount(3, $user->statuses);
    }

    /** @test */
    public function followAnotherUser()
    {
        // I have 2 users
        list($john, $susan) = TestDummy::times(2)->create('Larabook\Users\User');

        // and one user follows another user
        $this->repo->follow($john, $susan->id);

        // I should see the user in the list of users followed
        $this->assertCount(1, $john->followedUsers);
        $this->assertTrue($john->followedUsers->contains($susan->id));
        $this->tester->seeRecord('follows', [
            'follower_id' => $john->id,
            'followed_id' => $susan->id
        ]);
    }

    /** @test */
    public function unfollowAUser()
    {
        // I have 2 users
        list($john, $susan) =  TestDummy::times(2)->create('Larabook\Users\User');

        // and one user follows another user
        $this->repo->follow($john, $susan->id);
        $this->tester->seeRecord('follows', [
            'follower_id' => $john->id,
            'followed_id' => $susan->id
        ]);

        // when I unfollow a user
        $this->repo->unfollow($john, $susan->id);

        // I should see the user in the list of users followed
        $this->tester->dontSeeRecord('follows', [
            'follower_id' => $john->id,
            'followed_id' => $susan->id
        ]);
    }
}
