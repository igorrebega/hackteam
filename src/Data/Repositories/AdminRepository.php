<?php

namespace App\Data\Repositories;

use App\Data\Models\Admin;

/**
 * Class AdminRepository
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class AdminRepository extends Repository
{
    /**
     * @return string
     */
    protected function model()
    {
        return Admin::class;
    }
}