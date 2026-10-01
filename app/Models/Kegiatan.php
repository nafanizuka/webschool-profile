<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'nama_kegiatan', 'slug', 'foto', 'deskripsi',
        'tanggal', 'lokasi', 'status',
    ];

    protected function casts(): array
    {
        return ['tanggal' => 'date'];
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function getFotoUrlAttribute(): string
    {
        return $this->foto ? asset('storage/'.$this->foto) : asset('assets/img/no-image.svg');
    }

    public static function generateUniqueSlug(string $nama, ?int $ignoreId = null): string
    {
        $slug = Str::slug($nama);
        $original = $slug;
        $i = 1;
        while (static::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $original.'-'.$i++;
        }

        return $slug;
    }
}
