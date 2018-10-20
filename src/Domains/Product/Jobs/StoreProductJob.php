<?php

namespace App\Domains\Product\Jobs;

use App\Data\Repositories\ProductRepository;
use App\Services\Dashboard\Http\Requests\Product\StoreProductRequest;
use Lucid\Foundation\Job;

/**
 * Class StoreProductJob
 * @package App\Domains\Product\Jobs
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class StoreProductJob extends Job
{
    /**
     * @var StoreProductRequest
     */
    protected $request;

    /**
     * StoreProductJob constructor.
     * @param StoreProductRequest $request
     */
    public function __construct(StoreProductRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     * @param ProductRepository $productRepository
     * @return mixed
     */
    public function handle(ProductRepository $productRepository)
    {
        $attributes = $this->request->only(['title', 'description', 'price']);

        return $productRepository->fillAndSave($attributes);
    }
}
