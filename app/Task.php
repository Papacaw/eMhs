<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'Task';

    protected $fillable = [
        'nama',
        'judul_task',
        'deskripsi_task'
    ];
}