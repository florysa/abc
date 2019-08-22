<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParentsRequest extends FormRequest
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
            //
            'nom' => 'required',
            'prenoms' => 'required',
            'sexe' => 'required',
            'email' => '',
            'tel1' => '',
            'tel2' => '',
            'langueLocale' => '',
            'profession' => '',
            'idUtilisateur' => 'required'
        ];
    }
}