<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpsertDataOffloadRequest extends FormRequest
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
            'name'       => 'required|string',
            'phone_number' => 'nullable|string',
            'email'       => 'required|email:rfc',
            'message'   => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'name'          => "'Ваше имя'",
            'phone_number'  => "'Номер телефона'",
            'email'         => "'E-mail'",
            'message'       => "'Информация, которую вы хотите получить'",
        ];
    }
}
