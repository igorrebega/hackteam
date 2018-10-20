<?php

namespace App\Services\Dashboard\Features\Product;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Product\Jobs\FindProductByIdJob;
use Lucid\Foundation\Feature;

/**
 * Class EditProductFeature
 * @package App\Services\Backend\Features\Product
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class EditProductFeature extends Feature
{
    /**
     * @var int
     */
    protected $productId;

    /**
     * EditProductFeature constructor.
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

        return $this->run(new RespondWithViewJob('dashboard::product.edit',
            [
                'item' => $product
            ]
        ));
    }
}
