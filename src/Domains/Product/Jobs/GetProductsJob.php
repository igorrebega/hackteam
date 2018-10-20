<?php

namespace App\Domains\Product\Jobs;

use App\Data\Repositories\ProductRepository;
use Lucid\Foundation\Job;

/**
 * Class GetProductsJob
 * @package App\Domains\Product\Jobs
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class GetProductsJob extends Job
{
    /**
     * @param ProductRepository $productRepository
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function handle(ProductRepository $productRepository)
    {
        return $productRepository->all();
    }
}
