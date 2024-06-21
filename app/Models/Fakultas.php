<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = 'fakultas';

    use HasFactory;

    protected $fillable = [
        'id_fakultas',
        'fakultas',
    ];

    protected $primaryKey = 'id_fakultas';
}
