<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NatuxComingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $distance;
    public function __construct($distance)
    {
        $this->distance = $distance;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Natux Coming Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        if ($this->distance == 20) {
            return new Content(
                view: 'mail.natux-kozeleg',
            );
        }
        if ($this->distance == 0) {
            return new Content(
                view: 'mail.natux-arrived',
            );
        } else {
            return new Content(
                view: 'mail.natux-coming',
            );
        }
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
