<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    protected $table = 'beasiswa';

    use HasFactory;

    protected $fillable = [
        'id_beasiswa',
        'periode_awal_beasiswa',
        'periode_akhir_beasiswa',
    ];

    protected $primaryKey = 'id_beasiswa';

}
