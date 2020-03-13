<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Create_News_Request extends FormRequest
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

    public function messages()
    {
        return [
            'name.required' => 'Straipsnio pavadinimas turi tureti minimum 5 simbolius',
            'content.required' => 'Turinys turi tureti minimum 10 simboliu',
            'select_cat.required' => 'Prasome pasirinkti kategorija',

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'content' => 'required|min:10',
            'select_cat' => 'required',
        ];
    }

}