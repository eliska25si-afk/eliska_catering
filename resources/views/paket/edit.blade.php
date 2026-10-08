<!DOCTYPE html>
<html>
<head>
    <title>Edit Paket Catering - Eliska Catering</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2>Edit Paket Catering</h2>

    <div class="card mt-3">
        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">

                    <strong>Terjadi kesalahan!</strong>

                    <ul class="mb-0 mt-2">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif

            <form action="{{ route('paket.update', $paket) }}"
                  method="POST">

                @csrf

                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Paket</label>

                    <input type="text"
                           name="nama_paket"
                           class="form-control"
                           value="{{ old('nama_paket', $paket->nama_paket) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis</label>

                    <select name="jenis" class="form-control">

                        <option value="">
                            -- Pilih Jenis --
                        </option>

                        <option value="Harian"
                            {{ old('jenis', $paket->jenis) == 'Harian' ? 'selected' : '' }}>
                            Harian
                        </option>

                        <option value="Mingguan"
                            {{ old('jenis', $paket->jenis) == 'Mingguan' ? 'selected' : '' }}>
                            Mingguan
                        </option>

                        <option value="Acara"
                            {{ old('jenis', $paket->jenis) == 'Acara' ? 'selected' : '' }}>
                            Acara
                        </option>

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>

                    <input type="number"
                           name="harga"
                           class="form-control"
                           value="{{ old('harga', $paket->harga) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>

                    <textarea name="deskripsi"
                              class="form-control"
                              rows="4">{{ old('deskripsi', $paket->deskripsi) }}</textarea>
                </div>

                <button type="submit"
                        class="btn btn-success">
                    Update
                </button>

                <a href="{{ route('paket.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>