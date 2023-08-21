<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'siswa_id',
        'atribut_id',
        'nilai_id',
    ];


    public function atributs()
    {
        return $this->belongsTo(Atribut::class, 'atribut_id');
    }

    public function nilais()
    {
        return $this->belongsTo(Nilai::class, 'nilai_id');
    }

    public function siswas()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
