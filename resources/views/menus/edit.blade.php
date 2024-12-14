@extends('layouts.app')

@section('title', 'Edit Menu')

@section('content')
    <h1>Edit Menu</h1>
    <form action="{{ route('menus.update', $menu) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $menu->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $menu->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $menu->price }}" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select class="form-select" id="category" name="category_id" required>
                <option value="" disabled>Pilih Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $menu->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection