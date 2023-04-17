<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        $page = 'Register';
        return view('pages.register', compact('page'));
    }

    public function loginForm()
    {
        $page = 'Login';
        return view('pages.login', compact('page'));
    }

    public function register(Request $request)
    {
        // Validasi inputan
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed|min:6',
        ]);

        // Buat data pengguna
        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();


        $account = new Account();
        $account->fullname = $request->input('fullname');
        $account->balance = 0;
        $account->user_id = $user->id;
        $account->transfer_limit = 1000000;
        $account->top_up_limit = 1000000;
        $account->save();

        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }

    public function login(Request $request)
    {
        // Validasi inputan
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        // Lakukan proses autentikasi
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil
            return redirect()->route('dashboard')->with('success', 'Login berhasil.');
        } else {
            // Jika autentikasi gagal
            return redirect()->back()->with('error', 'Username atau password salah.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}