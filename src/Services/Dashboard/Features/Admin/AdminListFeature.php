<?php

namespace App\Services\Dashboard\Features\Admin;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Admin\Jobs\GetAdminsJob;
use Lucid\Foundation\Feature;

/**
 * Class AdminListFeature
 * @package App\Services\Backend\Features\Admin
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class AdminListFeature extends Feature
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function handle()
    {
        $admins = $this->run(new GetAdminsJob());

        return $this->run(new RespondWithViewJob('dashboard::admin.index',
            [
                'items' => $admins
            ]
        ));
    }
}
