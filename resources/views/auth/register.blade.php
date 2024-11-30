@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <form action="" class="border p-4 rounded shadow" style="width: 400px;">
        <h1 class="mb-4 text-center">Register</h1>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan email address" required>
        </div>
        <div class="mb-3">
            <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Masukkan password" required>
        </div>
        <div class="mb-3">
            <label for="inputPasswordConfirm" class="form-label">Confirm Password</label>
            <input type="password" id="inputPasswordConfirm" class="form-control" placeholder="Konfirmasi password" required>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary w-100" style="max-width: 200px;">Register</button>
        </div>
        <p class="mt-3 text-center">Jika sudah memiliki akun, silahkan <a href="{{ url('/login') }}">login</a></p>
    </form>
</div>
@endsection
