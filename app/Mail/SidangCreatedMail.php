<?php

namespace App\Mail;

use App\Models\Sidang;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SidangCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public Sidang $sidang;
    /**
     * Create a new message instance.
     */
    public function __construct(Sidang $sidang)
    {
        $this->sidang = $sidang;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pemberitahuan Jadwal Sidang',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.sidang.created',
            with: [
                'sidang' => $this->sidang
            ]
        );
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
