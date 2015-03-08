<?php namespace AdventureTimeBundle\Model;

class MailModel
{

    protected $mailer;
    protected $mail;

    public function __construct($mailer, $mail)
    {
        $this->mailer = $mailer;
        $this->mail = $mail;
    }

    public function sendMail($data)
    {
        try {
            $mailer = $this->mailer;

            $message = $mailer->createMessage()->setSubject($data['subject'])->setFrom($this->mail)->setTo($data['mail'])->setBody($data['body'], 'text/html');

            $mailer->send($message);
        } catch (\Exception $e) {
            throw new \Exception(__FUNCTION__ . $e->getMessage());
        }
    }

}