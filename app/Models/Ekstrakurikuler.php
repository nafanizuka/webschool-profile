<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $table = 'ekstrakurikuler';

    protected $fillable = [
        'nama', 'icon', 'foto', 'deskripsi', 'pembina',
        'jadwal', 'lokasi', 'status_aktif', 'urutan',
    ];

    protected function casts(): array
    {
        return ['status_aktif' => 'boolean'];
    }

    public function scopeAktif($query)
    {
        return $query->where('status_aktif', true);
    }

    public function getFotoUrlAttribute(): ?string
    {
        return $this->foto ? asset('storage/'.$this->foto) : null;
    }
}
