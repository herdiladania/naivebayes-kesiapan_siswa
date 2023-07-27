<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        return view('data_siswa.index', compact('data'), [
            "title" => "Data Siswa"
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
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'usia' => 'required|integer',
            'tmp_lahir' => 'required|string',
            'tgl_lahir' => 'required|date',
            'nama_ayah' => 'required|string',
            'nama_ibu' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan_ayah' => 'required|string',
            'pekerjaan_ibu' => 'required|string',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap Masih Kosong',
            'jenis_kelamin.required' => 'Jenis Kelamin Masih Kosong',
            'usia.required' => 'Usia Masih Kosong',
            'tmp_lahir.required' => 'Tempat Lahir Masih Kosong',
            'tgl_lahir.required' => 'Tanggal Lahir Masih Kosong',
            'nama_ayah.required' => 'Nama Ayah Masih Kosong',
            'nama_ibu.required' => 'Nama Ibu Masih Kosong',
            'agama.required' => 'Agama Masih Kosong',
            'pekerjaan_ayah.required' => 'Pekerjaan Ayah Masih Kosong',
            'pekerjaan_ibu.required' => 'Pekerjaan Ibu Masih Kosong',
        ]);

        Siswa::create($validatedData);
        return redirect()->route('data-siswa')->with('success', 'Data Berhasil Ditambahkan');
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
        $data = Siswa::findOrFail($id);
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'usia' => 'required|integer',
            'tmp_lahir' => 'required|string',
            'tgl_lahir' => 'required|date',
            'nama_ayah' => 'required|string',
            'nama_ibu' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan_ayah' => 'required|string',
            'pekerjaan_ibu' => 'required|string',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap Masih Kosong',
            'jenis_kelamin.required' => 'Jenis Kelamin Masih Kosong',
            'usia.required' => 'Usia Masih Kosong',
            'tmp_lahir.required' => 'Tempat Lahir Masih Kosong',
            'tgl_lahir.required' => 'Tanggal Lahir Masih Kosong',
            'nama_ayah.required' => 'Nama Ayah Masih Kosong',
            'nama_ibu.required' => 'Nama Ibu Masih Kosong',
            'agama.required' => 'Agama Masih Kosong',
            'pekerjaan_ayah.required' => 'Pekerjaan Ayah Masih Kosong',
            'pekerjaan_ibu.required' => 'Pekerjaan Ibu Masih Kosong',
        ]);


        $data->update($validatedData);

        return redirect()->route('data-siswa')->with('success', 'Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Siswa::find($id);
        $data->delete();
        return redirect()->route('data-siswa')->with('success', 'Data Berhasil Di Hapus');
    }
}
