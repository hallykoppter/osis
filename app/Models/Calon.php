<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama1',
        'nama2',
        'nomor',
        'visi',
        'misi',
        'foto',
        'warna',
        'jumlah_suara'
    ];

    protected $guarded = ['id'];
}
