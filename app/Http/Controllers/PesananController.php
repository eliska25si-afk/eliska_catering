<?php

namespace App\Http\Controllers;

use App\Models\PaketCatering;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Modul Pesanan  ->  memakai ELOQUENT ORM
 */
class PesananController extends Controller
{
    public function index(Request $request)
    {
        // with() = eager loading, supaya tidak N+1 query
        $pesanans = Pesanan::with(['pelanggan', 'paket'])
            ->status($request->status)      // local scope
            ->latest()
            ->get();

        return view('pesanan.index', compact('pesanans'));
    }

    public function create()
    {
        return view('pesanan.create', [
            'pelanggans' => Pelanggan::orderBy('nama')->get(),
            'pakets'     => PaketCatering::orderBy('nama_paket')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        // total harga dihitung di server (bukan dari input user)
        $paket = PaketCatering::findOrFail($validated['paket_catering_id']);
        $validated['total_harga'] = $paket->harga * $validated['jumlah_porsi'];

        Pesanan::create($validated);

        return redirect()
            ->route('pesanan.index')
            ->with('success', 'Pesanan berhasil ditambahkan.');
    }

    public function edit(Pesanan $pesanan)
    {
        return view('pesanan.edit', [
            'pesanan'    => $pesanan,
            'pelanggans' => Pelanggan::orderBy('nama')->get(),
            'pakets'     => PaketCatering::orderBy('nama_paket')->get(),
        ]);
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        $validated = $this->validated($request);

        $paket = PaketCatering::findOrFail($validated['paket_catering_id']);
        $validated['total_harga'] = $paket->harga * $validated['jumlah_porsi'];

        $pesanan->update($validated);

        return redirect()
            ->route('pesanan.index')
            ->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();

        return redirect()
            ->route('pesanan.index')
            ->with('success', 'Pesanan berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'pelanggan_id'      => 'required|exists:pelanggans,id',
            'paket_catering_id' => 'required|exists:paket_caterings,id',
            'tanggal_acara'     => 'required|date',
            'jumlah_porsi'      => 'required|integer|min:1',
            'status'            => ['required', Rule::in(Pesanan::STATUS)],
        ]);
    }
}
