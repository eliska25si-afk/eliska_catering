<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu Makanan - Eliska Catering</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2>Tambah Menu Makanan</h2>

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

            <form action="{{ route('menu.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Menu</label>

                    <input type="text"
                           name="nama_menu"
                           class="form-control"
                           value="{{ old('nama_menu') }}"
                           placeholder="Contoh: Nasi Ayam Sehat">

                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>

                    <select name="kategori" class="form-control">

                        <option value="">-- Pilih Kategori --</option>

                        <option value="Makanan"
                            {{ old('kategori') == 'Makanan' ? 'selected' : '' }}>
                            Makanan
                        </option>

                        <option value="Minuman"
                            {{ old('kategori') == 'Minuman' ? 'selected' : '' }}>
                            Minuman
                        </option>

                        <option value="Snack"
                            {{ old('kategori') == 'Snack' ? 'selected' : '' }}>
                            Snack
                        </option>

                    </select>

                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>

                    <input type="number"
                           name="harga"
                           class="form-control"
                           value="{{ old('harga') }}"
                           placeholder="Contoh: 25000">

                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>

                    <textarea name="deskripsi"
                              class="form-control"
                              rows="4"
                              placeholder="Masukkan deskripsi menu">{{ old('deskripsi') }}</textarea>

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    Simpan

                </button>

                <a href="{{ route('menu.index') }}"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>