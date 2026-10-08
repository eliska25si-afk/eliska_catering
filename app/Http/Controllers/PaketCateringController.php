<?php

namespace App\Http\Controllers;

use App\Models\PaketCatering;
use Illuminate\Http\Request;

class PaketCateringController extends Controller
{
    public function index()
    {
        $pakets = PaketCatering::latest()->get();

        return view('paket.index', compact('pakets'));
    }

    public function create()
    {
        return view('paket.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:100',
            'jenis' => 'required|string|max:50',
            'harga' => 'required|integer|min:0',
            'deskripsi' => 'required|string'
        ]);

        PaketCatering::create($validated);

        return redirect()
            ->route('paket.index')
            ->with('success', 'Paket catering berhasil ditambahkan.');
    }

    public function edit(PaketCatering $paket)
    {
        return view('paket.edit', compact('paket'));
    }

    public function update(Request $request, PaketCatering $paket)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:100',
            'jenis' => 'required|string|max:50',
            'harga' => 'required|integer|min:0',
            'deskripsi' => 'required|string'
        ]);

        $paket->update($validated);

        return redirect()
            ->route('paket.index')
            ->with('success', 'Paket catering berhasil diperbarui.');
    }

    public function destroy(PaketCatering $paket)
    {
        $paket->delete();

        return redirect()
            ->route('paket.index')
            ->with('success', 'Paket catering berhasil dihapus.');
    }
}