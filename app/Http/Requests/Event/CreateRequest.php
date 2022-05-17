<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'service_id'=>['required', 'integer'],
            'datetime' => ['required', 'date'],
            'comment' => ['nullable', 'string'],
            'fixprice' => ['required', 'string'],
        ];
    }

    public function messages():array
    {
        return [
            'required' => 'Необходимо заполнить поле :attribute.'
        ];
    }

    public function attributes():array
    {
        return [
            'name' => 'Имя',
            'lastname' => 'Фамилия',
            'phone' => 'Телефон',
            'datetime' => 'День',
            'fixprice' => 'Цена',
        ];
    }
}
