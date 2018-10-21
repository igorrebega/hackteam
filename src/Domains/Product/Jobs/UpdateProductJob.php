<?php

namespace App\Domains\Product\Jobs;

use App\Data\Models\Product;
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
     * @param int                  $productId
     */
    public function __construct(UpdateProductRequest $request, int $productId)
    {
        $this->request = $request;
        $this->productId = $productId;
    }

    /**
     * @param ProductRepository $productRepository
     * @return Product|bool
     */
    public function handle(ProductRepository $productRepository)
    {
        $attributes = $this->request->only(['title', 'description', 'price']);


        /** @var Product $product */
        $product = $productRepository->update($this->productId, $attributes);


        if ($this->request->hasFile('image')) {
            if ($product->hasMedia(Product::MEDIA_COLLECTION_IMAGES)) {
                $product->getFirstMedia(Product::MEDIA_COLLECTION_IMAGES)->delete();
            }

            $product->addMediaFromRequest('image')->toMediaCollection(Product::MEDIA_COLLECTION_IMAGES);
        }

        return true;
    }
}
