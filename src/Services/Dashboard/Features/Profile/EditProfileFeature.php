<?php

namespace App\Services\Dashboard\Features\Profile;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Admin\Jobs\FindAdminByIdJob;
use Lucid\Foundation\Feature;

/**
 * Class EditProfileFeature
 * @package App\Services\Dashboard\Features\Profile
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class EditProfileFeature extends Feature
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function handle()
    {
        $currentAdmin = $this->run(new FindAdminByIdJob(auth()->user()->id));

        return $this->run(new RespondWithViewJob('dashboard::profile.edit',
            [
                'item' => $currentAdmin
            ]
        ));
    }
}
