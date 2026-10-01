<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Small helper shared by admin controllers that accept an image upload.
 * Keeps controllers thin and upload handling consistent + validated.
 */
trait HandlesImageUpload
{
    protected function storeImage(UploadedFile $file, string $folder): string
    {
        $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'-'.Str::random(8).'.'.$file->getClientOriginalExtension();

        return $file->storeAs($folder, $filename, 'public');
    }

    protected function replaceImage(?string $oldPath, UploadedFile $file, string $folder): string
    {
        if ($oldPath) {
            Storage::disk('public')->delete($oldPath);
        }

        return $this->storeImage($file, $folder);
    }

    protected function deleteImage(?string $path): void
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }
}
