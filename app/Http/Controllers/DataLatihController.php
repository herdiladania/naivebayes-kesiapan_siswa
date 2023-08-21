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

    public function update(Request $request, $id)
    {
        $data = DataLatih::findOrFail($id);
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string',
            'usia' => 'required|integer',
            'motorik_kasar' => 'required|string',
            'motorik_halus' => 'required|date',
            'kognitif_anak' => 'required|string',
            'kemandirian' => 'required|string',
            'kompetensi_dasar_akhlak_perilaku_sosial_emosi' => 'required|string',
            'kompetensi_dasar_umum' => 'required|string',
            'kesiapan' => 'required|string',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap Masih Kosong',
            'usia.required' => 'Usia Masih Kosong',
            'motorik_kasar.required' => 'Motorik Kasar Masih Kosong',
            'motorik_halus.required' => 'Motorik Halus Masih Kosong',
            'kognitif_anak.required' => 'Koginitf Anak Masih Kosong',
            'kemandirian.required' => 'Kemandirian Masih Kosong',
            'kompetensi_dasar_akhlak_perilaku_sosial_emosi.required' => 'Kompetensi Akhlak Masih Kosong',
            'kompetensi_dasar_umum.required' => 'Kompotensi Dasar Umum Masih Kosong',
            'kesiapan.required' => 'Kesiapan Masih Kosong',
        ]);


        $data->update($validatedData);

        return redirect()->route('data-latih')->with('success', 'Data berhasil diperbaharui');
    }

    public function destroy($id)
    {
        $data = DataLatih::find($id);
        $data->delete();
        return redirect()->route('data-siswa')->with('success', 'Data Berhasil Di Hapus');
    }
}
