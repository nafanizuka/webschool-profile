<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PrestasiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_prestasi' => ['required', 'string', 'max:255'],
            'nama_siswa' => ['nullable', 'string', 'max:255'],
            'tingkat' => ['nullable', 'string', 'max:255'],
            'pencapaian' => ['nullable', 'string', 'max:255'],
            'tahun' => ['nullable', 'digits:4', 'integer'],
            'deskripsi' => ['nullable', 'string'],
            'status' => ['required', 'in:draft,published'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}
