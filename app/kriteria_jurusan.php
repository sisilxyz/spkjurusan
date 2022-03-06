<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kriteria_jurusan extends Model
{
    use HasFactory;
    protected $fillable = ['id_jurusan','id_kriteria'];
}
