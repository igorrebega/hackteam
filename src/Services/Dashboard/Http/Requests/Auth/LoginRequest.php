<?php

namespace App\Services\Dashboard\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 * @package App\Services\Dashboard\Http\Requests
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class LoginRequest extends FormRequest
{

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => 'email|required|exists:admins',
            'password' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'email'    => 'Email',
            'password' => 'Password',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'email.exists' => 'This email doesn\'t match any account'
        ];
    }
}