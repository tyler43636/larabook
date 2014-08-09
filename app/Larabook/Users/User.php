<?php namespace Larabook\Users;

use Hash;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Larabook\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    /**
     * The fields that can be mass assigned
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    /**
     * The user presenter class
     * @var string
     */
    protected $presenter = 'Larabook\Users\UserPresenter';

    public function statuses()
    {
        return $this->hasMany('Larabook\Statuses\Status');
    }

    public function follows()
    {
        return $this->belongsToMany(self::class, 'follows', 'follower_id', 'followed_id')
                    ->withTimestamps();
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Register a new user
     * @param $username
     * @param $email
     * @param $password
     * @return static
     */
    public static function register($username, $email, $password)
    {
        $user = new static(compact('username', 'email', 'password'));

        $user->raise(new UserRegistered($user));

        return $user;
        // raise an event
    }

    /**
     * Determine if the given user is the same as the current user
     * @param User $user
     * @return bool
     */
    public function is($user)
    {
        if (is_null($user))
        {
            return false;
        }
        return $this->username == $user->username;
    }

    /**
     * Determine if current user follows another user
     * @param User $otherUser
     * @return bool
     */
    public function isFollowedBy(User $otherUser)
    {
        $idsWhoOtherUserFollows = $otherUser->follows()->lists('followed_id');

        return in_array($this->id, $idsWhoOtherUserFollows);
    }

}
