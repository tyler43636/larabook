<?php

use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends \Codeception\TestCase\Test
{
   /**
    * @var \IntegrationTester
    */
    protected $tester;

    /**
     * @var Larabook\Statuses\StatusRepository
     */
    protected $repo;

    protected function _before()
    {
        $this->repo = $this->tester->grabService('Larabook\Statuses\StatusRepository');
    }

    /** @test */
    public function it_gets_all_statuses_for_a_user()
    {
        // Given I have 2 users
        $users = TestDummy::times(2)->create('Larabook\Users\User');
        // And statuses for both of them
        TestDummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[0]->id,
            'body' => 'My Status'
        ]);
        TestDummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[1]->id,
            'body' => 'His Status'
        ]);

        // When I fetch statuses for one user
        $statusesForUser = $this->repo->getAllForUser($users[0]);

        // Then I should receive only two statuses
        $this->assertCount(2, $statusesForUser);
    }

    /** @test */
    public function it_saves_a_status_for_a_user()
    {
        // Given I have an unsaved status
        $status = TestDummy::create('Larabook\Statuses\Status',[
            'user_id' => null,
            'body' => 'Save me!'
        ]);

        // And an existing user
        $user = TestDummy::create('Larabook\Users\User');

        // When I try to persist status
        $savedStatus = $this->repo->save($status, $user->id);

        // Then it should be saved to DB
        $this->tester->seeRecord('statuses',[
            'body' => 'Save me!'
        ]);

        // And the status should have the correct user id
        $this->assertEquals($user->id, $savedStatus->user_id);
    }
}