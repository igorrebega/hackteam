<?php

namespace App\Services\Website\Features\Product;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Product\Jobs\FindProductByIdJob;
use Lucid\Foundation\Feature;

/**
 * Class ViewProductFeature
 * @package App\Services\Website\Features\Product
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class ViewProductFeature extends Feature
{
    /**
     * @var int
     */
    private $productId;

    /**
     * ViewProductFeature constructor.
     * @param int $productId
     */
    public function __construct(int $productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function handle()
    {
        $product = $this->run(new FindProductByIdJob($this->productId));

        return $this->run(new RespondWithViewJob('website::product.view', [
            'product' => $product
        ]));
    }
}