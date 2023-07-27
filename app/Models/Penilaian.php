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


    public function atribut()
    {
        return $this->belongsTo(Atribut::class);
    }

    public function nilai()
    {
        return $this->belongsTo(Nilai::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
