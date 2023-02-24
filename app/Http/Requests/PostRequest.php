<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|filled|min:5|max:50',
            'content' => 'required|filled|min:10|max:1000',
            'address' => 'required|filled|max:100',
            'active' => 'required|filled',
            'image' => 'array|max:4',
            'place' => 'required|filled',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле :attribute обязательно для заполнения!',
            'content.required' => 'Поле :attribute обязательно для заполнения!',
            'title.filled' => 'Поле :attribute не должно быть пустым!',
            'content.filled' => 'Поле :attribute не должно быть пустым!',
            'title.min' => 'Поле :attribute не должно быть менее :min символов!',
            'title.max' => 'Поле :attribute не должно быть менее :max символов!',
            'content.min' => 'Поле :attribute не должно быть менее :min символов!',
            'content.max' => 'Поле :attribute не должно быть менее :max символов!',
            'address.max' => 'Поле :attribute не должно быть менее :max символов!',
            'address.filled' => 'Поле :attribute не должно быть пустым!',
            'address.required' => 'Поле :attribute обязательно для заполнения!',
            'active.filled' => 'Поле :attribute не должно быть пустым!',
            'active.required' => 'Поле :attribute обязательно для заполнения!',
            'place.filled' => 'Поле :attribute не должно быть пустым!',
            'place.required' => 'Поле :attribute обязательно для заполнения!',
            'image.max' => 'Максимум картинок: 4!',
//            'image.*.image.mimes' => 'Тип картинки дожен быть PNG!'
        ];
    }
}
