<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitatRequest extends FormRequest
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
            'nom_habitat' => 'required',
              'capacite_habitat' => 'required',
              'prix_habitat' => 'required',
              'adresse_habitat' => 'required',
              'cp_habitat' => 'required',
              'ville_habitat' => 'required',
              'pays_habitat' => 'required',
              'num_habitat' => 'required',
              'photo_habitat' => 'required'
        ];
    }
}
