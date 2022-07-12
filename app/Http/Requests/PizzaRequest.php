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
            'description' => 'required|min:10',
            'price' => 'required|numeric|min:1|max:99',
            'popularity' => 'nullable|numeric|min:1|max:2'
        ];
    }



    public function messages()
    {
        return [
            'name.required' => 'Il campo è obbligatorio',
            'name.min' => 'Il campo deve contenere come minimo :min caratteri',
            'name.max' => 'Il campo deve contenere al massimo :max caratteri',

            'description.required' => 'Il campo è obbligatorio',
            'description.min' => 'Il campo deve contenere come minimo :min caratteri',

            'price.required' => 'Il campo è obbligatorio',
            'price.numeric' => 'il dato deve essere un numero',
            'price.min' => 'Il dato deve contenere come minimo :min numeri',
            'price.max' => 'Il dato deve contenere al massimo :max numeri',

            'popularity.numeric' => 'l dato deve essere un numero',
            'popularity.min' => 'Il campo deve contenere come minimo :min numeri',
            'popularity.max' => 'Il campo deve contenere al massimo :max numeri'

        ];
    }
}
