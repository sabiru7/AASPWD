@extends('layouts.app')

@section('title', 'Menu Details')

@section('content')
    <h1>{{ $menu->name }}</h1>
    <p><strong>Description:</strong> {{ $menu->description }}</p>
    <p><strong>Price:</strong> ${{ number_format($menu->price, 2) }}</p>
    <p><strong>Category:</strong> {{ $menu->category->name }}</p> 

    <div class="mt-3">
        <a href="{{ route('menus.index') }}" class="btn btn-secondary">Back to Menu List</a>
        <a href="{{ route('menus.edit', $menu) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('menus.destroy', $menu) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection