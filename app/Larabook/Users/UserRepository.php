<?php
namespace Larabook\Users;

class UserRepository {

    /**
     * Persist the user
     * @param User $user
     * @return mixed
     */
    public function save(User $user)
    {
        return $user->save();
    }

    /**
     * Get a paginated list of all users
     * @param int $howMany
     * @return mixed
     */
    public function getPaginated($howMany = 20)
    {
        return User::orderBy('username', 'asc')->paginate($howMany);
    }

    /**
     * Fetch a user by username
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::with(['statuses'])->whereUsername($username)->first();
    }

    /**
     * Find a user by their ID
     * @param $userId
     * @return \Illuminate\Support\Collection|static
     */
    public function findById($userId)
    {
        return User::findOrFail($userId);
    }

    /**
     * Follow a larabook user
     * @param User $user
     * @param $userIdToFollow
     */
    public function follow(User $user, $userIdToFollow)
    {
        $user->followedUsers()->attach($userIdToFollow);
    }


    /**
     * Unfollow a Larabook user
     * @param User $user
     * @param $userIdToUnfollow
     */
    public function unfollow(User $user, $userIdToUnfollow)
    {
        $user->followedUsers()->detach($userIdToUnfollow);
    }
}
