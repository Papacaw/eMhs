<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'Mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'gender',
        'prodi',
        'minat',
    ];
}

