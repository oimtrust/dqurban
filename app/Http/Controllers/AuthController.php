<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserManagement\Role;
use App\Models\UserManagement\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

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
}
