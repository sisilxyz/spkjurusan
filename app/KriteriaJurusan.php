<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaJurusan extends Model
{
    use HasFactory;
    protected $fillable = [
       'id_jurusan',
       'id_kriteria'
      ];

    public function namaJurusan()
    {
       return $this->belongsTo(Jurusan::class,'id_jurusan');
    }

    public function namaKriteria()
    {
       return $this->belongsTo(Kriteria::class,'id_kriteria');
    }
}
