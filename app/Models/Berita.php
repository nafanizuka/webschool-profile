<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul', 'slug', 'thumbnail', 'isi', 'penulis',
        'tanggal_publikasi', 'status',
    ];

    protected function casts(): array
    {
        return ['tanggal_publikasi' => 'date'];
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where('tanggal_publikasi', '<=', now());
    }

    public function getThumbnailUrlAttribute(): string
    {
        return $this->thumbnail ? asset('storage/'.$this->thumbnail) : asset('assets/img/no-image.svg');
    }

    public static function generateUniqueSlug(string $judul, ?int $ignoreId = null): string
    {
        $slug = Str::slug($judul);
        $original = $slug;
        $i = 1;
        while (static::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $original.'-'.$i++;
        }

        return $slug;
    }
}
