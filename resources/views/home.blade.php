@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container mt-5">
    <h3 class="text-center mb-4">Menu Baru di Fore Cafe</h3>
    <div class="text-center">
        <img src="https://pict.sindonews.net/dyn/850/pena/news/2021/11/28/185/612663/4-inovasi-fore-coffee-jelang-musim-liburan-dan-tahun-baru-xoh.jpg" class="img-fluid rounded shadow" alt="Fore Coffee">
    </div>
    <br>
    <div class="text-center">
        <a href="{{ route('menus.index') }}"><button class="btn btn-success btn-lg mt-3">Lihat Menu</button>
        
    </div>
</div>

<style>
    h3 {
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
    .btn {
        transition: background-color 0.3s, transform 0.3s; /* Transisi untuk efek hover */
    }
    .btn:hover {
        background-color: #45a049; /* Warna saat hover */
        transform: scale(1.05); /* Efek pembesaran saat hover */
    }
</style>

@endsection