<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\Registered;

class registerController extends Controller
{
   
    public function showRegistrationForm()
    {
        return view('auth.register'); 
    }    

    
    public function register(RegisterRequest $request)
    {
        $user = $this->create($request->validated());

        event(new Registered($user));

        Session::flash('success', 'Pendaftaran berhasil! Silakan cek email Anda untuk verifikasi.');

        return redirect()->route('login'); 
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}