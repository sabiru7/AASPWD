@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <form action="{{ route('login') }}" method="POST" class="border p-4 rounded shadow" style="width: 400px;">
        @csrf
        <h1 class="mb-4 text-center">Login</h1>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email address" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary w-100" style="max-width: 200px;">Login</button>
        </div>
        <p class="mt-3 text-center">Jika belum memiliki akun, silahkan <a href="{{ url('/register') }}">membuat akun</a></p>
    </form>
</div>
@endsection
