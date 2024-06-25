<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeasiswaDetail extends Model
{
    protected $table = 'beasiswa_detail';

    use HasFactory;

    protected $fillable = [
        'id_beasiswa_detail',
        'users_id',
        'beasiswa_id_beasiswa',
        'jenis_beasiswa',
        'dokumen_beasiswa',
        'ipk',
        'poin_portofolio',
        'semester',
        'prodi',
    ];

    protected $primaryKey = 'id_beasiswa_detail';

}
