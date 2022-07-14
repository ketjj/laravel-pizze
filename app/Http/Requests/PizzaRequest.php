<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'price' => 'required|numeric|min:1|max:99',
            'popularity' => 'nullable|numeric|min:1|max:2',
            'ingredients' => 'required'
        ];
    }



    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'name.min' => 'Il nome deve contenere come minimo :min caratteri',
            'name.max' => 'Il nome deve contenere al massimo :max caratteri',

            'price.required' => 'Il prezzo è obbligatorio',
            'price.numeric' => 'il prezzo deve essere un numero',
            'price.min' => 'Il prezzo deve contenere come minimo :min numeri',
            'price.max' => 'Il prezzo deve contenere al massimo :max numeri',

            'popularity.numeric' => 'Il voto deve essere un numero',
            'popularity.min' => 'Il voto deve contenere come minimo :min numeri',
            'popularity.max' => 'Il voto deve contenere al massimo :max numeri',

            'ingredients.required' => 'È obbligatorio inserire almeno un ingrediente'

        ];
    }
}
