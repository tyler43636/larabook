<?php  namespace Larabook\Statuses;

use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

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