<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'     => 'required | string',
            'email'    => 'required | email  | unique:users',
            'password' => 'required',
            'role'     => 'required | integer'
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'You need to fill in this field',
            'name.string'   => 'Name need to be string',

            'email.required' => 'You need to fill in this field',
            'email.email'    => 'Email need to be like this ______@___.__',

            'password.required' => 'Password field need to be fill',
        ];
    }
}
