<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class UserController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        $userId = auth()->id();
        $name = $request->name;
        $email = $request->email;
        $password = $request->password ? Hash::make($request->password) : null;

        $userData = [
            'name' => $name,
            'email' => $email,
            'updated_at' => now(), // Atur waktu pembaruan
        ];

        // Hanya jika password baru tidak kosong, kami akan mengupdate password
        if ($password !== null) {
            $userData['password'] = $password;
        }

        // Update record pengguna dengan menggunakan Query Builder
        DB::table('users')
            ->where('id', $userId)
            ->update($userData);

        return Redirect::route('users.index')->with('success', 'Profile updated successfully.');
    }

}
