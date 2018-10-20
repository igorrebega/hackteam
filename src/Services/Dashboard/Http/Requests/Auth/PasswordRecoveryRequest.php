<?php

namespace App\Services\Dashboard\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PasswordRecoveryRequest
 * @package App\Services\Dashboard\Http\Requests\Auth
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class PasswordRecoveryRequest extends FormRequest
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
            'email' => 'required|email|exists:admins'
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'email' => 'Email'
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