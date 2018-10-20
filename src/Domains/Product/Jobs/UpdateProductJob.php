<?php

namespace App\Domains\Product\Jobs;

use App\Data\Repositories\ProductRepository;
use App\Services\Dashboard\Http\Requests\Product\UpdateProductRequest;
use Lucid\Foundation\Job;

/**
 * Class UpdateProductJob
 * @package App\Domains\Product\Jobs
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class UpdateProductJob extends Job
{
    /**
     * @var UpdateProductRequest
     */
    protected $request;

    /**
     * @var int
     */
    protected $productId;

    /**
     * UpdateProductJob constructor.
     * @param UpdateProductRequest $request
     * @param int $productId
     */
    public function __construct(UpdateProductRequest $request, int $productId)
    {
        $this->request = $request;
        $this->productId = $productId;
    }

    /**
     * @param ProductRepository $productRepository
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle(ProductRepository $productRepository)
    {
        $attributes = $this->request->only(['title', 'description', 'price']);

        return $productRepository->update($this->productId, $attributes);
    }
}
