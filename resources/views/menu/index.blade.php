<!DOCTYPE html>
<html>
<head>
    <title>Data Menu Makanan - Eliska Catering</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2>Data Menu Makanan</h2>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <a href="{{ route('menu.create') }}"
       class="btn btn-primary mb-3">

        + Tambah Menu

    </a>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>

                <th>No</th>
                <th>Nama Menu</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($menus as $menu)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $menu->nama_menu }}
                    </td>

                    <td>
                        {{ $menu->kategori }}
                    </td>

                    <td>
                        Rp {{ number_format($menu->harga, 0, ',', '.') }}
                    </td>

                    <td>
                        {{ $menu->deskripsi }}
                    </td>

                    <td>

                        <a href="{{ route('menu.edit', $menu) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('menu.destroy', $menu) }}"
                              method="POST"
                              class="d-inline">

                            @csrf

                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus menu ini?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6"
                        class="text-center">

                        Belum ada data menu makanan.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

</body>
</html>