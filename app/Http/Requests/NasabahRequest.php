<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NasabahRequest extends FormRequest
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
            'kd_nasabah' => 'required|unique:nasabah',
            'nm_nasabah' => 'required',
            'no_hp' => 'required|number',
            'email' => 'required|unique:nasabah',
            'alamat' => 'required',
            'id_users' => 'required|unique:nasabah',
        ];
    }
}
