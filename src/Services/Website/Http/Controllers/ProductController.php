<?php

namespace App\Services\Website\Http\Controllers;

use App\Services\Website\Features\Product\ProductListFeature;
use App\Services\Website\Features\Product\ViewProductFeature;
use Lucid\Foundation\Http\Controller;

/**
 * Class ProductController
 * @package App\Services\Website\Http\Controllers
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class ProductController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(ProductListFeature::class);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function view(int $id)
    {
        return $this->serve(ViewProductFeature::class, [
            'productId' => $id
        ]);
    }
}
