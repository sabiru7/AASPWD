<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Menampilkan daftar menu
    public function index()
    {
        // Mengambil semua menu dengan kategori
        $menus = Menu::with('category')->paginate(10);
        return view('menus.index', compact('menus'));
    }

    // Menampilkan form untuk menambah menu
    public function create()
    {
        // Mengambil semua kategori
        $categories = Category::all(); // Ambil semua kategori
        return view('menus.create', compact('categories'));
    }

    // Menyimpan menu baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Simpan menu ke database
        Menu::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit menu
    public function edit(Menu $menu)
    {
        // Mengambil semua kategori
        $categories = Category::all(); // Ambil semua kategori
        return view('menus.edit', compact('menu', 'categories'));
    }

    // Memperbarui menu di database
    public function update(Request $request, Menu $menu)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Update menu di database
        $menu->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui.');
    }

    // Menghapus menu dari database
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus.');
    }
}