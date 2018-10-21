<?php

namespace App\Services\Dashboard\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreAdminRequest
 * @package App\Services\Backend\Http\Requests
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class StoreAdminRequest extends FormRequest
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
            'name'     => 'required|string|max:255',
            'surname'  => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:admins',
            'password' => 'required|string|min:6|max:255|confirmed',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'name'     => 'Name',
            'surname'  => 'Surname',
            'email'    => 'Email',
            'password' => 'Password',
        ];
    }
}