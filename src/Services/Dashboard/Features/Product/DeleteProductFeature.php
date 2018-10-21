<?php

namespace App\Services\Dashboard\Features\Product;

use App\Domains\Product\Jobs\DeleteProductJob;
use Lucid\Foundation\Feature;

/**
 * Class DeleteProductFeature
 * @package App\Services\Dashboard\Features\Product
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class DeleteProductFeature extends Feature
{
    /**
     * @var int
     */
    protected $productId;

    /**
     * DeleteProductFeature constructor.
     * @param int $productId
     */
    public function __construct(int $productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle()
    {
        $result = $this->run(new DeleteProductJob($this->productId));

        if (!$result) {
            return redirect()->back()->with('ntf-danger', 'Error has been occurred while deleting');
        }

        return redirect()->route('products')->with('ntf-success', 'Product has been successfully deleted');
    }
}
