<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pertanyaan',
        'jawaban',
        'id_jurusan',
        'rating'
       ];

       public function namaPertanyaan()
       {
          return $this->belongsTo(Pertanyaan::class,'id_pertanyaan');
       }

       public function namaJurusan()
       {
          return $this->belongsTo(Jurusan::class,'id_jurusan');
       }
}
