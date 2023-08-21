<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use App\Models\Pohon;
use App\Models\Siswa;
use App\Models\Atribut;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\PerhitunganController;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Atribut::with('nilais')->get();
        $data_siswa = Siswa::get();
        $data_penilaian = Penilaian::with('siswas', 'atributs', 'nilais')->get();
        $counts = [];
        foreach ($data_siswa as $siswa) {
            $counts[$siswa->id] = $this->cekbtn($siswa->id);
        }

        $perhitungan = new PerhitunganController;
        $perhitungan->index();

        return view('data_penilaian.index', compact('data', 'data_siswa', 'data_penilaian', 'counts'))->with([
            "title" => "Data Penilaian"
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
        $siswaId = $request->input('siswa_id');
        $atributIds = $request->input('atribut_id');
        $nilaiIds = $request->input('nilai_id');

        if (count($atributIds) !== count($nilaiIds)) {
            return redirect()->back()->with('error', 'Invalid form data.');
        }


        foreach ($atributIds as $index => $atributId) {
            $nilaiId = $nilaiIds[$index];

            Penilaian::create([
                'siswa_id' => $siswaId,
                'atribut_id' => $atributId,
                'nilai_id' => $nilaiId,
            ]);
        }


        return redirect()->route('data-penilaian')->with('success', 'Data Berhasil Ditambahkan');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Penilaian::where('siswa_id', $id)->delete();
        return redirect()->route('data-penilaian')->with('success', 'Data Berhasil Dihapus');
    }


    public function cekbtn($idSiswa)
    {
        $count = Penilaian::where('siswa_id', $idSiswa)->count();
        return $count;
    }
}
