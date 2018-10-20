<?php

namespace App\Services\Dashboard\Features\Product;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Product\Jobs\GetProductsJob;
use Lucid\Foundation\Feature;

/**
 * Class ProductListFeature
 * @package App\Services\Dashboard\Features\Product
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class ProductListFeature extends Feature
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function handle()
    {
        $products = $this->run(new GetProductsJob());

        return $this->run(new RespondWithViewJob('dashboard::product.index',
            [
                'items' => $products
            ]
        ));
    }
}
