<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use App\Models\Nilai;
use App\Models\Pohon;
use App\Models\Siswa;
use App\Models\Atribut;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;

class BerandaController extends Controller
{

    public function index()
    {
        $count_siswa = Siswa::count();
        $count_atribut = Atribut::count();
        $count_nilai = Nilai::count();
        // $count_subkriteria = Subkriteria::count();

        return view('beranda', [
            "title" => "Beranda",
            "count_siswa" => $count_siswa,
            "count_atribut" => $count_atribut,
            "count_nilai" => $count_nilai,
            // "count_subkriteria" => $count_subkriteria,
        ]);
    }
}
