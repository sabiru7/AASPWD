@extends('layouts.app')

@section('title', 'Daftar Menu')

@section('content')
<div class="container">
    <h1>Daftar Menu</h1>
    <a href="{{ route('menus.create') }}" class="btn btn-success">Tambah Menu</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $menu)
                <tr>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->description }}</td>
                    <td>{{ $menu->price }}</td>
                    <td>{{ $menu->category->name }}</td>
                    <td>
                        <a href="{{ route('menus.edit', $menu) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('menus.destroy', $menu) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $menus->links() }}
</div>
@endsection