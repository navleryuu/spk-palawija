<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';
    protected $fillable = ['code', 'nama', 'deskripsi', 'tahun'];

    public function nilai()
    {
        return $this->hasMany(\App\Models\Nilai::class, 'alternatif_id');
    }
}
