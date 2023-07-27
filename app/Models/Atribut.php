<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atribut extends Model
{
    protected $fillable = [
        'kode_atribut',
        'nama_atribut',
    ];

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'atribut_id');
    }
}
