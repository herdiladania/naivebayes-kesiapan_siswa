<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'usia',
        'tmp_lahir',
        'tgl_lahir',
        'nama_ayah',
        'nama_ibu',
        'agama',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
    ];

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'siswa_id');
    }
}
