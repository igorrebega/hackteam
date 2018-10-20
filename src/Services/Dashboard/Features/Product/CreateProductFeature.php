<?php

namespace App\Services\Dashboard\Features\Product;

use App\Data\Models\Product;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;

/**
 * Class CreateProductFeature
 * @package App\Services\Dashboard\Features\Product
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class CreateProductFeature extends Feature
{
    /**
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function handle(Product $product)
    {
        return $this->run(new RespondWithViewJob('dashboard::product.create',
            [
                'item' => $product
            ]
        ));
    }
}
