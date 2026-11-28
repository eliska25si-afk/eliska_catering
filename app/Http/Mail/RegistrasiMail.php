<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

/**
 * EMAIL #1 - dikirim saat registrasi, berisi link reset password.
 */
class RegistrasiMail extends Mailable
{
    public function __construct(
        public User $user,
        public string $resetUrl,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Selamat Datang di Eliska Catering - Atur Password Anda');
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.registrasi',
            with: [
                'expire' => config('auth.passwords.users.expire', 60),
            ],
        );
    }
}
