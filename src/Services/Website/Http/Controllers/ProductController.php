<?php

namespace App\Services\Website\Http\Controllers;

use App\Services\Dashboard\Features\Product\ProductListFeature;
use App\Services\Website\Features\Product\AnalisePhotoFeature;
use App\Services\Website\Features\Product\ViewProductFeature;
use Lucid\Foundation\Http\Controller;

/**
 * Class ProductController
 * @package App\Services\Dashboard\Http\Controllers
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class ProductController extends Controller
{
    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        view()->share('menuActive', 'products');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(ProductListFeature::class);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        return $this->serve(ViewProductFeature::class);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function vote($id)
    {
        return $this->serve(AnalisePhotoFeature::class, [
            'productId' => $id
        ]);
    }
}
