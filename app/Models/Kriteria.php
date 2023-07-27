<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $fillable = [
        'aspek_id',
        'kode',
        'nama',
        'bobot',
    ];

    public function aspeks()
    {
        return $this->belongsTo(Aspek::class);
    }

    public function subkriterias()
    {
        return $this->hasMany(Subkriteria::class);
    }
    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}
