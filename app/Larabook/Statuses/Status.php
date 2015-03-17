<?php  namespace Larabook\Statuses;

use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

/**
 * Larabook\Statuses\Status
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $body
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Larabook\Users\User $user
 * @method static \Illuminate\Database\Query\Builder|\Larabook\Statuses\Status whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Larabook\Statuses\Status whereUserId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Larabook\Statuses\Status whereBody($value) 
 * @method static \Illuminate\Database\Query\Builder|\Larabook\Statuses\Status whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Larabook\Statuses\Status whereUpdatedAt($value) 
 */
class Status extends \Eloquent {

    /**
     * Traits used for Status
     */
    use EventGenerator, PresentableTrait;

    /**
     * Fields that are fillable via mass assignment
     * @var array
     */
    protected $fillable = ['body'];

    /**
     * The status presenter class
     * @var string
     */
    protected $presenter = 'Larabook\Statuses\StatusPresenter';

    public function user()
    {
        return $this->belongsTo('Larabook\Users\User');
    }

    public static function publish($body)
    {
        $status = new static(compact('body'));

        $status->raise(new StatusWasPublished($body));

        return $status;
    }
} 