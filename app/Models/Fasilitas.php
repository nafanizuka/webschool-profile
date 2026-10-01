<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';

    protected $fillable = [
        'nama', 'foto', 'deskripsi', 'kondisi', 'lokasi', 'urutan',
    ];

    public function getFotoUrlAttribute(): string
    {
        return $this->foto ? asset('storage/'.$this->foto) : asset('assets/img/no-image.svg');
    }
}
