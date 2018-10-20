<?php

namespace App\Data\Repositories;

use App\Data\Models\Product;

/**
 * Class ProductRepository
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class ProductRepository extends Repository
{
    /**
     * @return string
     */
    function model()
    {
        return Product::class;
    }

    /**
     * @return mixed
     */
    public function getSortedProducts()
    {
        return $this->model
            ->select('products.*', \DB::raw('AVG( product_rankmoji.overall_rank ) as rating'))
            ->leftJoin('product_rankmoji', 'product_rankmoji.product_id', '=', 'products.id')
            ->groupBy('products.id')
            ->orderBy('rating', 'desc')
            ->get();
    }
}