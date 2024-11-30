@extends('layouts.app')

@section('title', 'Menu List')

@section('content')
    <h1>Menu List</h1>
    <a href="{{ route('menus.create') }}" class="btn btn-primary">Add Menu</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->description }}</td>
                    <td>${{ number_format($menu->price, 2) }}</td>
                    <td>
                        @if($menu->image)
                            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" width="100">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('menus.edit', $menu) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('menus.destroy', $menu) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection