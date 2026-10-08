<!DOCTYPE html>
<html>
<head>
    <title>Data Paket Catering - Eliska Catering</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2>Data Paket Catering</h2>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <a href="{{ route('paket.create') }}"
       class="btn btn-primary mb-3">

        + Tambah Paket

    </a>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse($pakets as $paket)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $paket->nama_paket }}
                    </td>

                    <td>
                        {{ $paket->jenis }}
                    </td>

                    <td>
                        Rp {{ number_format($paket->harga, 0, ',', '.') }}
                    </td>

                    <td>
                        {{ $paket->deskripsi }}
                    </td>

                    <td>

                        <a href="{{ route('paket.edit', $paket) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('paket.destroy', $paket) }}"
                              method="POST"
                              class="d-inline">

                            @csrf

                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus paket ini?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6"
                        class="text-center">

                        Belum ada data paket catering.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

</body>
</html>