<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diizinkan untuk membuat permintaan ini.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Atur sesuai kebutuhan
    }

    /**
     * Dapatkan aturan validasi yang berlaku untuk permintaan ini.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    /**
     * Dapatkan pesan kesalahan khusus untuk aturan validasi.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nama diperlukan.',
            'email.required' => 'Email diperlukan.',
            'password.required' => 'Password diperlukan.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ];
    }
}