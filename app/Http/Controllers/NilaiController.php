<?php

namespace App\Http\Controllers;

use App\Models\Atribut;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Atribut::with('nilais')->get();
        return view('data_nilai.index', compact('data'), [
            "title" => "Data Nilai"
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
            'atribut_id' => 'required',
            'nama_nilai' => 'required|string',
        ], [
            'nama_nilai.required' => 'Nama Masih Kosong',
        ]);

        Nilai::create($validatedData);
        return redirect()->route('data-nilai')->with('success', 'Data Berhasil Ditambahkan');
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
        $data = Nilai::findOrFail($id);
        $validatedData = $request->validate([
            'nama_nilai' => 'required|string',
        ], [
            'nama_nilai.required' => 'Nama Masih Kosong',
        ]);


        $data->update($validatedData);

        return redirect()->route('data-nilai')->with('success', 'Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Nilai::find($id);
        $data->delete();
        return redirect()->route('data-nilai')->with('success', 'Data Berhasil Di Hapus');
    }
}
