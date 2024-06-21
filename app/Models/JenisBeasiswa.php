<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBeasiswa extends Model
{
    protected $table = 'jenis_beasiswa';

    use HasFactory;

    protected $fillable = [
        'id_jenis_beasiswa',
        'jenis_beasiswa',
    ];

    protected $primaryKey = 'id_jenis_beasiswa';
}
