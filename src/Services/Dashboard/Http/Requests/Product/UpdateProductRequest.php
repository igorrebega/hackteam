<?php

namespace App\Services\Dashboard\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProductRequest
 * @package App\Services\Dashboard\Http\Requests\Product
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class UpdateProductRequest extends FormRequest
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
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|between:0,999999999.99',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'title'       => 'Title',
            'description' => 'Description',
            'price'       => 'Price',
        ];
    }
}