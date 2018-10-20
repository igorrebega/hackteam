<?php

namespace App\Data\Repositories;

use App\Data\Models\Admin;

/**
 * Class AdminRepository
 * @package App\Data\Repositories
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class AdminRepository extends Repository
{
    /**
     * @return string
     */
    function model()
    {
        return Admin::class;
    }
}