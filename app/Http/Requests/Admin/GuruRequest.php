<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GuruRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $imageRule = $this->isMethod('post') ? 'required' : 'nullable';

        return [
            'nama' => ['required', 'string', 'max:255'],
            'nip_nik' => ['nullable', 'string', 'max:50'],
            'jabatan' => ['required', 'string', 'max:255'],
            'mata_pelajaran' => ['nullable', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'foto' => [$imageRule, 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'urutan' => ['nullable', 'integer', 'min:0'],
            'status_aktif' => ['nullable', 'boolean'],
        ];
    }
}
