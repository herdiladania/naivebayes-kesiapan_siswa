<?php

namespace App\Http\Controllers;

use App\Models\DataLatih;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class DataLatihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DataLatih::all();
        return view('data_latih.index', compact('data'), [
            "title" => "Data Latih"
        ]);
    }

    public function import(Request $request)
    {
        if ($request->hasFile('file_data_latih')) {
            $file = $request->file('file_data_latih');

            DataLatih::truncate();

            $spreadsheet = IOFactory::load($file->getPathname());
            $worksheet = $spreadsheet->getActiveSheet();

            foreach ($worksheet->getRowIterator(2) as $row) {
                $rowData = [];
                foreach ($row->getCellIterator() as $cell) {
                    $rowData[] = $cell->getValue();
                }

                DataLatih::create([
                    'nama_lengkap' => $rowData[0],
                    'usia' => $rowData[1],
                    'motorik_kasar' => $rowData[2],
                    'motorik_halus' => $rowData[3],
                    'kognitif_anak' => $rowData[4],
                    'kemandirian' => $rowData[5],
                    'kompetensi_dasar_akhlak_perilaku_sosial_emosi' => $rowData[6],
                    'kompetensi_dasar_umum' => $rowData[7],
                    'kesiapan' => $rowData[8],
                ]);
            }

            return redirect()->route('data-latih')->with('success', 'Data Berhasil Ditambahkan.');
        } else {
            return redirect()->route('data-latih')->with('error', 'Gagal. Pilih File Data Latih.');
        }
    }
}
