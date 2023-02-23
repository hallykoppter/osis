<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class count_race extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'calon_1',
        'calon_2',
        'calon_3'
    ];

    protected $guarded = ['id'];
}
