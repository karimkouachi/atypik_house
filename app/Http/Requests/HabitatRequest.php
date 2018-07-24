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
              'num_habitat' => 'required|max:15',
              'prix_habitat' => 'required|max:5',
              'photo_habitat' => 'required'
        ];
    }
}
