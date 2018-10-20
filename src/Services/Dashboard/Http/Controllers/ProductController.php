<?php

namespace App\Services\Dashboard\Http\Controllers;

use App\Services\Dashboard\Features\Product\CreateProductFeature;
use App\Services\Dashboard\Features\Product\DeleteProductFeature;
use App\Services\Dashboard\Features\Product\EditProductFeature;
use App\Services\Dashboard\Features\Product\StoreProductFeature;
use App\Services\Dashboard\Features\Product\UpdateProductFeature;
use App\Services\Dashboard\Features\Product\ProductListFeature;
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
    public function create()
    {
        return $this->serve(CreateProductFeature::class);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        return $this->serve(StoreProductFeature::class);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->serve(EditProductFeature::class, [
            'productId' => (int)$id
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        return $this->serve(UpdateProductFeature::class, [
            'productId' => (int)$id
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        return $this->serve(DeleteProductFeature::class, [
            'productId' => (int)$id
        ]);
    }
}
