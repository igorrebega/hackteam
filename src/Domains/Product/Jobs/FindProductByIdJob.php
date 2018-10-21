<?php

namespace App\Domains\Product\Jobs;

use App\Data\Repositories\ProductRepository;
use Lucid\Foundation\Job;

/**
 * Class FindProductByIdJob
 * @package App\Domains\Product\Jobs
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class FindProductByIdJob extends Job
{
    /**
     * @var int
     */
    protected $productId;

    /**
     * FindProductByIdJob constructor.
     * @param int $productId
     */
    public function __construct(int $productId)
    {
        $this->productId = $productId;
    }

    /**
     * @param ProductRepository $productRepository
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle(ProductRepository $productRepository)
    {
        return $productRepository->find($this->productId);
    }
}
