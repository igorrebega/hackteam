<?php

namespace App\Services\Dashboard\Features\Product;

use App\Domains\Product\Jobs\UpdateProductJob;
use App\Services\Dashboard\Http\Requests\Product\UpdateProductRequest;
use Lucid\Foundation\Feature;

/**
 * Class UpdateProductFeature
 * @package App\Services\Backend\Features\Product
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class UpdateProductFeature extends Feature
{
    /**
     * @var int
     */
    protected $productId;

    /**
     * UpdateProductFeature constructor.
     * @param int $productId
     */
    public function __construct(int $productId)
    {
        $this->productId = $productId;
    }

    /**
     * @param UpdateProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(UpdateProductRequest $request)
    {
        $result = $this->run(new UpdateProductJob($request, $this->productId));

        if (!$result) {
            return redirect()->back()->with('ntf-danger', 'Error has been occurred while saving');
        }

        return redirect()->route('products')->with('ntf-success', 'Product has been successfully created');
    }
}
