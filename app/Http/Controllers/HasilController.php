<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index()
    {
        $data = Hasil::All();
        return view('data_hasil.index', compact('data'))->with([
            "title" => "Data Hasil"
        ]);
    }

    public function riwayat()
    {
        $data = Riwayat::All();
        return view('data_riwayat.index', compact('data'))->with([
            "title" => "Data Riwayat"
        ]);
    }
}
