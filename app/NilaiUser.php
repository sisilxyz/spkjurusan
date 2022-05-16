<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_datauser',
        'nilaisiswa',
        'id_kriteria',
       ];

       public function nisn()
       {
          return $this->belongsTo(datauser::class,'id_datauser');
       }
   
       public function nama()
       {
          return $this->belongsTo(datauser::class,'id_datauser');
       }
   
       public function nama_kriteria()
       {
          return $this->belongsTo(Kriteria::class,'id_kriteria');
       }
}
