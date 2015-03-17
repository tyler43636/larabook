<?php  namespace Larabook\Mailers;

use Illuminate\Mail\Mailer as Mail;

abstract class Mailer {

    /**
     * @var Mail
     */
    private $mail;

    /**
     * @param Mail $mail
     */
    function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    /**
     * @param Mailable $recipient
     * @param $subject
     * @param $view
     * @param array $data
     * @internal param User $user
     */
    public function sendTo(Mailable $recipient, $subject, $view, $data = [])
    {
        $this->mail->queue($view, $data, function($message) use($recipient, $subject)
        {
            $message->to($recipient->getEmailAddress())->subject($subject);
        });
    }

} 