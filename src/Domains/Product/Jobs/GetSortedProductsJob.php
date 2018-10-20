<?php

namespace App\Domains\Product\Jobs;

use App\Data\Repositories\ProductRepository;
use Lucid\Foundation\Job;

/**
 * Class GetSortedProductsJob
 * @package App\Domains\Product\Jobs
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class GetSortedProductsJob extends Job
{
    /**
     * @param ProductRepository $productRepository
     * @return mixed
     */
    public function handle(ProductRepository $productRepository)
    {
        return $productRepository->getSortedProducts();
    }
}