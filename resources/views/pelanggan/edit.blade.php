<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2>Edit Pelanggan</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pelanggan.update', $pelanggan) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text"
                   name="nama"
                   class="form-control"
                   value="{{ old('nama', $pelanggan->nama) }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   value="{{ old('email', $pelanggan->email) }}">
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text"
                   name="no_hp"
                   class="form-control"
                   value="{{ old('no_hp', $pelanggan->no_hp) }}">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat"
                      class="form-control">{{ old('alamat', $pelanggan->alamat) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">
            Update
        </button>

        <a href="{{ route('pelanggan.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html>