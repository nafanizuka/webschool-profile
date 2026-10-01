<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $fillable = [
        'nama', 'nip_nik', 'jabatan', 'mata_pelajaran',
        'foto', 'deskripsi', 'urutan', 'status_aktif',
    ];

    protected function casts(): array
    {
        return ['status_aktif' => 'boolean'];
    }

    public function scopeAktif($query)
    {
        return $query->where('status_aktif', true);
    }

    public function getFotoUrlAttribute(): string
    {
        return $this->foto ? asset('storage/'.$this->foto) : asset('assets/img/no-image.svg');
    }
}
