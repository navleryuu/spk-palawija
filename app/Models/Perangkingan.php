<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perangkingan extends Model
{
    use HasFactory;

    protected $table = 'perangkingans';
    protected $fillable = ['alternatif_id', 'skor_moora', 'rank_moora'];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
