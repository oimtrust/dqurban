<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserManagement\Role;
use App\Models\UserManagement\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'email'     => 'required|email|unique:users',
            'username'  => 'required|unique:users|string',
            'password'  => 'required|min:8'
        ]);

        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->roles()->attach(Role::findBySlug('superadmin')->id);
        Alert::success('Berhasil', 'Pendaftaran akun Superadmin berhasil');

        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $remember_me = (!empty($request->remember)) ? true : false;

        if (Auth::attempt($credential)) {
            $user = User::where(['username' => $credential['username']])->first();

            Auth::login($user, $remember_me);

            return redirect()->route('home');
        }

        Alert::error('Gagal', 'Maaf username dan atau password anda salah');
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
