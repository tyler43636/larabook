<?php  namespace Larabook\Handlers;

use Larabook\Mailers\UserMailer;
use Larabook\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventListener;

class EmailNotifier extends EventListener {


    /**
     * @var UserMailer
     */
    private $mailer;

    /**
     * @param UserMailer $mailer
     */
    function __construct(UserMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function whenUserRegistered(UserRegistered $event)
    {
        return $this->mailer->sendWelcomeMessageTo($event->user);
    }

} 