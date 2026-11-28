<?php

namespace App\Mail;

use App\Models\Pesanan;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

/**
 * EMAIL #2 (kondisi custom) - dikirim ke pelanggan saat status pesanan berubah.
 */
class StatusPesananMail extends Mailable
{
    public function __construct(
        public Pesanan $pesanan,
        public string $statusLama,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Status Pesanan #{$this->pesanan->id} Anda: {$this->pesanan->status}"
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.status-pesanan');
    }
}
