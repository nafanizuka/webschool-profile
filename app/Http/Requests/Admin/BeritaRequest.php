<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BeritaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $imageRule = $this->isMethod('post') ? 'required' : 'nullable';

        return [
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string'],
            'penulis' => ['nullable', 'string', 'max:255'],
            'tanggal_publikasi' => ['required', 'date'],
            'status' => ['required', 'in:draft,published'],
            'thumbnail' => [$imageRule, 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}
