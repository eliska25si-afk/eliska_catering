<!DOCTYPE html>
<html lang="id">
<body style="font-family: Arial, sans-serif; background:#f3f4f6; padding:24px;">
    <div style="max-width:520px; margin:auto; background:#fff; border-radius:12px; padding:28px;">
        <h2 style="color:#0b2a5b; margin-top:0;">Halo, {{ $pesanan->pelanggan->nama }}</h2>
        <p>Status pesanan catering Anda telah diperbarui:</p>

        <p style="text-align:center; font-size:15px;">
            {{ $statusLama }} &nbsp;➜&nbsp; <strong style="color:#1d4ed8;">{{ $pesanan->status }}</strong>
        </p>

        <table style="width:100%; border-collapse:collapse; font-size:14px;" cellpadding="8">
            <tr style="border-bottom:1px solid #e5e7eb;"><td>No. Pesanan</td><td>#{{ $pesanan->id }}</td></tr>
            <tr style="border-bottom:1px solid #e5e7eb;"><td>Paket</td><td>{{ $pesanan->paket->nama_paket }}</td></tr>
            <tr style="border-bottom:1px solid #e5e7eb;"><td>Tanggal Acara</td><td>{{ $pesanan->tanggal_acara->format('d M Y') }}</td></tr>
            <tr style="border-bottom:1px solid #e5e7eb;"><td>Jumlah Porsi</td><td>{{ $pesanan->jumlah_porsi }}</td></tr>
            <tr><td>Total Harga</td><td>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td></tr>
        </table>

        @if($pesanan->status === 'Selesai')
            <p>Terima kasih sudah memesan di Eliska Catering! 🙏</p>
        @elseif($pesanan->status === 'Dibatalkan')
            <p>Pesanan Anda dibatalkan. Hubungi kami jika ini bukan permintaan Anda.</p>
        @elseif($pesanan->status === 'Diproses')
            <p>Pesanan Anda sedang kami siapkan dengan sepenuh hati.</p>
        @endif
    </div>
</body>
</html>
