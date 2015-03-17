<?php namespace Larabook\Users;

use Hash;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Larabook\Mailers\Mailable;
use Larabook\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

/**
 * Larabook\Users\User
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Larabook\Statuses\Status[] $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection|\static::class[] $followedUsers
 * @property-read \Illuminate\Database\Eloquent\Collection|\static::class[] $followers
 * @method static \Illuminate\Database\Query\Builder|\Larabook\Users\User whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Larabook\Users\User whereUsername($value) 
 * @method static \Illuminate\Database\Query\Builder|\Larabook\Users\User whereEmail($value) 
 * @method static \Illuminate\Database\Query\Builder|\Larabook\Users\User wherePassword($value) 
 * @method static \Illuminate\Database\Query\Builder|\Larabook\Users\User whereRememberToken($value) 
 * @method static \Illuminate\Database\Query\Builder|\Larabook\Users\User whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Larabook\Users\User whereUpdatedAt($value) 
 */
class User extends Eloquent implements UserInterface, RemindableInterface, Mailable {

    /**
     * Traits used by the User model
     */
    use UserTrait, RemindableTrait, EventGenerator, PresentableTrait, FollowableTrait;

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

    /**
     * Statuses for a user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statuses()
    {
        return $this->hasMany('Larabook\Statuses\Status')->latest();
    }

    /**
     * Automatically hash passwords
     * @param $password
     */
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
     * Return the email address for the mailable interface
     */
    public function getEmailAddress()
    {
        return $this->email;
    }
}
