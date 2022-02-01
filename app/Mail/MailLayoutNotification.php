<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailLayoutNotification extends Mailable
{
    use Queueable, SerializesModels;
    protected $mail = ['title' => '', 'text' => '', 'url' => '', 'button' => '', 'subject' => ''];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $title, $text)
    {
        $this->mail['subject'] = $subject;
        $this->mail['title'] = $title;
        $this->mail['text'] = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->mail['subject'])
                    ->view('mail.layoutNotification')
                    ->with([
                        'title' => $this->mail['title'],
                        'text' => $this->mail['text'],
                    ]);
    }
}
