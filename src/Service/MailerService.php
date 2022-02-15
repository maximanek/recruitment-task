<?php

namespace App\Service;

use App\Entity\Message;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerService
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    /**
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    public function execute(Message $message): void {
        $email = (new Email())
            ->from('maximanek@gmail.com')
            ->to('ziemanek@gmail.com')
            ->subject('New message with title: ' . $message->getTitle())
            ->text("Here's message content: " . $message->getContent());

        $this->mailer->send($email);
    }
}