<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';

    use HasFactory;

    protected $fillable = [
        'id_prodi',
        'prodi',
    ];

    protected $primaryKey = 'id_prodi';
}
