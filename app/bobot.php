<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    use HasFactory;
    protected $fillable = ['kode_bobot','id_kriteria', 'nilai_bobot','nilai_normalisasi'];

    public function namaKriteria()
{
   return $this->belongsTo(Kriteria::class, 'id');
    }
}

