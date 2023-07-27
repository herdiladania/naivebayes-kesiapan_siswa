<?php

namespace App\Http\Controllers;

use App\Models\Atribut;
use Illuminate\Http\Request;

class AtributController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Atribut::all();
        return view('data_atribut.index', compact('data'), [
            "title" => "Data Atribut"
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
            'kode_atribut' => 'required|string',
            'nama_atribut' => 'required|string',
        ], [
            'kode.required' => 'Kode Masih Kosong',
            'nama.required' => 'Nama Masih Kosong',
        ]);

        Atribut::create($validatedData);
        return redirect()->route('data-atribut')->with('success', 'Data Berhasil Ditambahkan');
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
        $data = Atribut::findOrFail($id);
        $validatedData = $request->validate([
            'kode_atribut' => 'required|string',
            'nama_atribut' => 'required|string',
        ], [
            'kode.required' => 'Kode Masih Kosong',
            'nama.required' => 'Nama Masih Kosong',
        ]);


        $data->update($validatedData);

        return redirect()->route('data-atribut')->with('success', 'Data berhasil diperbaharui');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Atribut::find($id);
        $data->delete();
        return redirect()->route('data-atribut')->with('success', 'Data Berhasil Di Hapus');
    }
}
