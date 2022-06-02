<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nisn',
        'matematika',
        'ipa',
        'ips',
        'bing',
        'bindo',
        'tik'
       ];
}
