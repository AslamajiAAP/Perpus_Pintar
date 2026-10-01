<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Untuk proses update, kita bisa mengecualikan ID member yang sedang diedit jika diperlukan
        $memberId = $this->route('member') ? $this->route('member')->id : null;

        return [
            'nim' => 'required|string|max:20|unique:members,nim,' . $memberId,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:members,email,' . $memberId,
            'nomor_telepon' => 'required|string|max:15',
            'status' => 'required|in:aktif,nonaktif',
            'alamat' => 'nullable|string',
        ];
    }
}