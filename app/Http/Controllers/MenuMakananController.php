<?php

namespace App\Http\Controllers;

use App\Models\MenuMakanan;
use Illuminate\Http\Request;

class MenuMakananController extends Controller
{
    public function index()
    {
        $menus = MenuMakanan::latest()->get();

        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_menu' => 'required|string|max:100',
            'kategori' => 'required|string|max:50',
            'harga' => 'required|integer|min:0',
            'deskripsi' => 'required|string'
        ]);

        MenuMakanan::create($validated);

        return redirect()
            ->route('menu.index')
            ->with('success', 'Menu makanan berhasil ditambahkan.');
    }

    public function edit(MenuMakanan $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, MenuMakanan $menu)
    {
        $validated = $request->validate([
            'nama_menu' => 'required|string|max:100',
            'kategori' => 'required|string|max:50',
            'harga' => 'required|integer|min:0',
            'deskripsi' => 'required|string'
        ]);

        $menu->update($validated);

        return redirect()
            ->route('menu.index')
            ->with('success', 'Menu makanan berhasil diperbarui.');
    }

    public function destroy(MenuMakanan $menu)
    {
        $menu->delete();

        return redirect()
            ->route('menu.index')
            ->with('success', 'Menu makanan berhasil dihapus.');
    }
}