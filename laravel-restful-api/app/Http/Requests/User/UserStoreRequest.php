<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;

class UserStoreRequest extends BaseFormRequest
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
            'email' => 'required|email|unique:users',
            'user_name' => 'required|string|max:30',
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'password' => 'required|min:6|max:30'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is necessary thing',
            'user_name.required' => 'User name is necessary thing',
            'first_name.required' => 'First name is necessary thing',
            'last_name.required' => 'Last name is necessary thing',
            'password.required' => 'Password is necessary thing',
            'email.unique' => 'Email is must be unique',
        ];
    }
}
