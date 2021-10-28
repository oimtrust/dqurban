<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserManagement\Role;
use App\Models\UserManagement\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 20;
        $users = User::orderBy('updated_at', 'DESC')->paginate($pagination);
        return view('users.index', compact('users'))->with('item', ($request->input('page', 1) -1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_telp' => 'required'
        ]);

        $user = new User();
        $user->name = $request->get('nama');
        $user->email = $request->get('email');
        $user->username = $request->get('username');
        $user->phone = $request->get('no_telp');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        if (!empty($request->get('role'))) {
            $user->roles()->attach($request->get('role'));
        }
        return redirect()->route('user.create')->with('success', 'Anggota berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $request->validate([
            'nama' => ['required', 'string', 'max:50'],
            'no_telp' => ['required']
        ]);

        $user = User::find($id);
        $user->name = $request->get('nama');
        $user->email = $request->get('email');
        $user->username = $request->get('username');
        $user->phone = $request->get('no_telp');
        $user->save();
        if (!empty($request->get('role'))) {
            $user->roles()->sync($request->get('role'));
        }
        return redirect()->route('user.edit', ['user' => $id])->with('success', 'Perubahan data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::whereId($id)->delete();
        return redirect()->back()->with('success', 'Data pengguna berhasil terhapus');
    }
}
