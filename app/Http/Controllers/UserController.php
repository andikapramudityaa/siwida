<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user', [
            'pageTitle' => 'Akun',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register', [
            'pageTitle' => 'Registrasi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|alpha_dash|unique:users,username|min:3|max:30',
            'name' => 'required|min:3|max:25',
            'password' => 'required|min:6|max:30'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = 'user';
        $validatedData['remember_token'] = Str::random(10);

        if ($request->phoneNumber) {
            $validatedData['phoneNumber'] = $request->phoneNumber;
        }

        User::create($validatedData);

        return redirect('/login')->with('success', 'Akun berhasil didaftarkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.account.edit', [
            'pageTitle' => 'Perbarui Akun',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:25',
            'phoneNumber' => 'required'
        ]);

        User::where('id', $user->id)->update($validatedData);

        return redirect('/admin/users/')->with('success', 'Akun Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $currentUser = auth()->user()->username;

        User::destroy($user->id);

        // Check for self-delete account
        if ($currentUser === $user->username) {
            return redirect('/');
        }

        return redirect('/admin/users')->with('success', 'Akun Berhasil Dihapus');
    }
}
