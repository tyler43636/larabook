<?php  namespace Larabook\Statuses;

use Larabook\Users\User;

class StatusRepository {

    public function getAllForUser(User $user)
    {
        return $user
            ->statuses()
            ->with('user')
            ->latest()
            ->get();
    }

    /**
     * Save a new status for a user
     * @param Status $status
     * @param $userId
     * @return mixed
     */
    public function save(Status $status, $userId)
    {
        return User::findOrFail($userId)
            ->statuses()
            ->save($status);
    }

    /**
     * Get the feed for the user
     * @param User $user
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getFeedForUser(User $user)
    {
        $userIds = $user->follows()->lists('followed_id');

        $userIds[] = $user->id;

        return Status::whereIn('user_id', $userIds)->latest()->get();
    }
} 