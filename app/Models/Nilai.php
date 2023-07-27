<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
        'atribut_id',
        'nama_nilai',
    ];

    public function atribut()
    {
        return $this->belongsTo(Atribut::class);
    }

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'nilai_id');
    }
}
