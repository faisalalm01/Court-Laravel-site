<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class TambahPengajuanCutiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'jenis_cuti' =>  ['required'],
            'alasan_cuti' => ['required'],
            'lama_cuti' => ['required'],
            'ket_lamacuti' => ['required'],
            'dari_tanggal' => ['required'],
            'sampai_dengan' => ['required'],
            'atasan' => ['required'],


        ];
    }
}
