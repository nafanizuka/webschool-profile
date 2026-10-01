<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PengaturanWebsite extends Model
{
    protected $table = 'pengaturan_website';

    protected $fillable = ['key', 'value'];

    public $timestamps = true;

    /**
     * Get all settings as a key => value array, cached.
     */
    public static function allSettings(): array
    {
        return Cache::rememberForever('pengaturan_website', function () {
            return static::pluck('value', 'key')->toArray();
        });
    }

    public static function get(string $key, $default = null)
    {
        return static::allSettings()[$key] ?? $default;
    }

    public static function set(string $key, $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget('pengaturan_website');
    }

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('pengaturan_website'));
        static::deleted(fn () => Cache::forget('pengaturan_website'));
    }
}
