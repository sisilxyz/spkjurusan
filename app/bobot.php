<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bobot extends Model
{
    use HasFactory;
    protected $fillable = ['kode_bobot','id_kriteria', 'nilai_bobot','nilai_normalisasi'];
}
