<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
        try {
            \DB::connection()->getPdo();
            echo "Koneksi ke database berhasil.";
        } catch (\Exception $e) {
            die("Koneksi ke database gagal: " . $e->getMessage());
        }
    
        $menus = Menu::all();
        return view('menus.index', compact('menus'));

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->price = $request->price;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $menu->image = $imagePath;
        }

        $menu->save();

        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->price = $request->price;

        if ($request->hasFile('image')) {
            if ($menu->image) {
                Storage::disk('public')->delete($menu->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $menu->image = $imagePath;
        }

        $menu->save();

        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->image) {
            Storage::disk('public')->delete($menu->image);
        }

        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }
}
