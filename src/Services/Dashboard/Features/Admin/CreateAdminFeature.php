<?php

namespace App\Services\Dashboard\Features\Admin;

use App\Data\Models\Admin;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;

/**
 * Class CreateAdminFeature
 * @package App\Services\Dashboard\Features\Admin
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class CreateAdminFeature extends Feature
{
    /**
     * @param Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function handle(Admin $admin)
    {
        return $this->run(new RespondWithViewJob('dashboard::admin.create',
            [
                'item' => $admin
            ]
        ));
    }
}
