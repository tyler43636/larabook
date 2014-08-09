<?php namespace Larabook\Users;

class FollowUserCommand {

    /**
     * The user performing the follow command
     * @var
     */
    public $userId;

    /**
     * The user to follow
     * @var
     */
    public $userIdToFollow;

    /**
     * @param $userId
     * @param $userIdToFollow
     */
    function __construct($userId, $userIdToFollow)
    {
        $this->userId = $userId;
        $this->userIdToFollow = $userIdToFollow;
    }

}