<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $data = Riwayat::All();
        return view('data_riwayat.index', compact('data'))->with([
            "title" => "Data Riwayat"
        ]);
    }
}
