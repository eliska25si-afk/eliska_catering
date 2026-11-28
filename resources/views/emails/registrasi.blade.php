<!DOCTYPE html>
<html lang="id">
<body style="font-family: Arial, sans-serif; background:#f3f4f6; padding:24px;">
    <div style="max-width:520px; margin:auto; background:#fff; border-radius:12px; padding:28px;">
        <h2 style="color:#0b2a5b; margin-top:0;">Halo, {{ $user->name }} 👋</h2>
        <p>Terima kasih sudah mendaftar di <strong>Eliska Catering</strong>.
           Akun Anda sudah aktif dengan role <strong>Pelanggan</strong>.</p>
        <p>Klik tombol di bawah untuk mengatur ulang password Anda:</p>

        <p style="text-align:center; margin:28px 0;">
            <a href="{{ $resetUrl }}"
               style="background:#1d4ed8; color:#fff; padding:12px 24px; border-radius:8px; text-decoration:none;">
                Reset Password
            </a>
        </p>

        <p style="font-size:13px; color:#6b7280;">
            Link berlaku {{ $expire }} menit. Jika Anda tidak merasa mendaftar, abaikan email ini.
        </p>
        <p style="font-size:12px; color:#9ca3af; word-break:break-all;">Atau salin link: {{ $resetUrl }}</p>
    </div>
</body>
</html>
