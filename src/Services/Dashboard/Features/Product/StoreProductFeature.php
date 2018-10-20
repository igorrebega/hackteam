<?php

namespace App\Services\Dashboard\Features\Product;

use App\Domains\Product\Jobs\StoreProductJob;
use App\Services\Dashboard\Http\Requests\Product\StoreProductRequest;
use Lucid\Foundation\Feature;

/**
 * Class StoreProductFeature
 * @package App\Services\Dashboard\Features\Product
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class StoreProductFeature extends Feature
{
    /**
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(StoreProductRequest $request)
    {
        $result = $this->run(new StoreProductJob($request));

        if (!$result) {
            return redirect()->back()->with('ntf-danger', 'Error has been occurred while saving');
        }

        return redirect()->route('products')->with('ntf-success', 'Product has been successfully created');
    }
}
