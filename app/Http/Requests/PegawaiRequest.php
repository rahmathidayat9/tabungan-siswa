<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kd_pegawai' => 'required|unique:pegawai',
            'nm_pegawai' => 'required',
            'no_hp' => 'required|number',
            'email' => 'required|unique:pegawai',
            'alamat' => 'required',
            'id_users' => 'required|unique:pegawai',
        ];
    }
}
