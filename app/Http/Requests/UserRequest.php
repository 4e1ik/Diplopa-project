<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'max:50|alpha|nullable',
            'surname' => 'max:50|alpha|nullable',
            'about' => 'max:500|nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Поле :attribute не должно быть менее :min символов!',
            'name.alpha' => 'Поле :attribute должно состоять только из букв!',
            'surname.min' => 'Поле :attribute не должно быть менее :min символов!',
            'surname.alpha' => 'Поле :attribute должно состоять только из букв!',
            'about.min' => 'Поле :attribute не должно быть менее :min символов!',
//            'about.alpha_dash' => 'Поле :attribute должно может содержать только буквенно-цифровые символы, а также дефисы и подчеркивания!',
            'name.max' => 'Поле :attribute не должно быть менее :max символов!',
            'surname.max' => 'Поле :attribute не должно быть менее :max символов!',
            'about.max' => 'Поле :attribute не должно быть менее :max символов!',
        ];
    }
}
