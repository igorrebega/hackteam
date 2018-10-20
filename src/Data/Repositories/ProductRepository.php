<?php

namespace App\Data\Repositories;

use App\Data\Models\Product;

/**
 * Class ProductRepository
 * @package App\Data\Repositories
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
}