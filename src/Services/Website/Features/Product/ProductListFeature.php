<?php

namespace App\Services\Website\Features\Product;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Product\Jobs\GetSortedProductsJob;
use Lucid\Foundation\Feature;

/**
 * Class ProductListFeature
 * @package App\Services\Website\Features\Product
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class ProductListFeature extends Feature
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function handle()
    {
        $products = $this->run(new GetSortedProductsJob());

        return $this->run(new RespondWithViewJob('website::product.index', [
            'products' => $products
        ]));
    }
}