<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'name' => ['string', 'max:255'],
            'lastname' => ['string', 'max:255'],
            'patronymic' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'phone' => ['string', 'max:255'],
            'password' => ['string', 'min:8', 'confirmed'],
            'profession' => ['string', 'max:255'],
        ];
    }
}
