@extends('layouts.app')

@section('title', 'Data Pelanggan - Eliska Catering')

@section('content')
<h2>Data Pelanggan</h2>

<a href="{{ route('pelanggan.create') }}"
   class="btn btn-primary mb-3">
    + Tambah Pelanggan
</a>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

        @forelse($pelanggans as $pelanggan)

        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>{{ $pelanggan->nama }}</td>

            <td>{{ $pelanggan->email }}</td>

            <td>{{ $pelanggan->no_hp }}</td>

            <td>{{ $pelanggan->alamat }}</td>

            <td>

                <a href="{{ route('pelanggan.edit', $pelanggan) }}"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('pelanggan.destroy', $pelanggan) }}"
                      method="POST"
                      class="d-inline">

                    @csrf

                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data?')">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="6" class="text-center">
                Belum ada data pelanggan.
            </td>
        </tr>

        @endforelse

    </tbody>

</table>
@endsection