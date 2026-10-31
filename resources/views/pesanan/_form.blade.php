<div class="mb-3">
    <label class="form-label">Pelanggan</label>
    <select name="pelanggan_id" class="form-select">
        <option value="">-- Pilih Pelanggan --</option>
        @foreach($pelanggans as $pelanggan)
            <option value="{{ $pelanggan->id }}"
                {{ old('pelanggan_id', $pesanan->pelanggan_id ?? '') == $pelanggan->id ? 'selected' : '' }}>
                {{ $pelanggan->nama }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Paket Catering</label>
    <select name="paket_catering_id" class="form-select">
        <option value="">-- Pilih Paket --</option>
        @foreach($pakets as $paket)
            <option value="{{ $paket->id }}"
                {{ old('paket_catering_id', $pesanan->paket_catering_id ?? '') == $paket->id ? 'selected' : '' }}>
                {{ $paket->nama_paket }} - Rp {{ number_format($paket->harga, 0, ',', '.') }} / porsi
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Tanggal Acara</label>
    <input type="date" name="tanggal_acara" class="form-control"
           value="{{ old('tanggal_acara', isset($pesanan) ? $pesanan->tanggal_acara->format('Y-m-d') : '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Jumlah Porsi</label>
    <input type="number" name="jumlah_porsi" min="1" class="form-control"
           value="{{ old('jumlah_porsi', $pesanan->jumlah_porsi ?? '') }}">
    <div class="form-text">Total harga dihitung otomatis: harga paket x jumlah porsi.</div>
</div>

<div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-select">
        @foreach(\App\Models\Pesanan::STATUS as $status)
            <option value="{{ $status }}"
                {{ old('status', $pesanan->status ?? 'Menunggu') == $status ? 'selected' : '' }}>
                {{ $status }}
            </option>
        @endforeach
    </select>
</div>
