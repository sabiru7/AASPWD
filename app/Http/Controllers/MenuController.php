<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('category')->paginate(10);
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        // Mengambil kategori Makanan dan Minuman
        $categories = Category::whereIn('name', ['Makanan', 'Minuman'])->get();
        return view('menus.create', compact('categories'));
    }

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

    public function edit(Menu $menu)
    {
        $categories = Category::whereIn('name', ['Makanan', 'Minuman'])->get();
        return view('menus.edit', compact('menu', 'categories'));
    }

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

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus.');
    }
}