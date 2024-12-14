@extends('layouts.app')

@section('title', 'Add Menu')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Add Menu</h1>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select class="form-select" id="category" name="category_id" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="1">Makanan</option> 
                        <option value="2">Minuman</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    h1 {
        font-family: 'Arial', sans-serif;
        color: #4CAF50; /* Warna hijau */
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }
    .container {
        background-color: #f9f9f9; /* Warna latar belakang */
        border-radius: 10px; /* Sudut melengkung */
        padding: 20px; /* Padding di dalam kontainer */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan */
    }
    .card {
        border-radius: 10px; /* Sudut melengkung untuk kartu */
    }
    .btn {
        transition: background-color 0.3s, transform 0.3s; /* Transisi untuk efek hover */
    }
    .btn:hover {
        background-color: #0056b3; /* Warna saat hover */
        transform: scale(1.05); /* Efek pembesaran saat hover */
    }
</style>

@endsection