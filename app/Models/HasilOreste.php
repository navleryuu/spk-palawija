<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilOreste extends Model
{
    use HasFactory;

    protected $table = 'hasil_oreste';
    protected $fillable = [
        'alternatif',
        'nilai_moora',
        'nilai',        // ini nilai_oreste
        'total_nilai'
    ];
    public $timestamps = false;
}
