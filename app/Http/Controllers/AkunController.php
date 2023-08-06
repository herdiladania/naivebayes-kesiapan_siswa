<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('kelola_akun.index', compact('data'), [
            "title" => "Data Akun"
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'level' => 'integer',
            'password' => 'required|string',
        ], [
            'name.required' => 'Nama Pengguna Masih Kosong',
            'email.required' => 'Email Masih Kosong',
            'password.required' => 'Kata Sandi Masih Kosong',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect()->route('kelola-akun')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'level' => 'required|integer',
            'password' => 'required|string',
        ], [
            'name.required' => 'Nama Pengguna Masih Kosong',
            'email.required' => 'Email Masih Kosong',
            'password.required' => 'Kata Sandi Masih Kosong',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $data->update($validatedData);

        return redirect()->route('kelola-akun')->with('success', 'Data berhasil diperbaharui');
    }


    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('kelola-akun')->with('success', 'Data Berhasil Di Hapus');
    }
}
