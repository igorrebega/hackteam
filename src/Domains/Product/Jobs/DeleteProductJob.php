<?php

namespace App\Domains\Product\Jobs;

use App\Data\Repositories\ProductRepository;
use Lucid\Foundation\Job;

/**
 * Class DeleteProductJob
 * @package App\Domains\Product\Jobs
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class DeleteProductJob extends Job
{
    /**
     * @var int
     */
    protected $productId;

    /**
     * DeleteProductJob constructor.
     * @param int $productId
     */
    public function __construct(int $productId)
    {
        $this->productId = $productId;
    }

    /**
     * @param ProductRepository $productRepository
     * @return bool
     */
    public function handle(ProductRepository $productRepository)
    {
        return $productRepository->remove($this->productId);
    }
}
