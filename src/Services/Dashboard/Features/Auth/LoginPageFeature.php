<?php

namespace App\Services\Dashboard\Features\Auth;

use App\Data\Models\Admin;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;

/**
 * Class LoginPageFeature
 * @package App\Services\Dashboard\Features\Auth
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class LoginPageFeature extends Feature
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function handle()
    {
        return $this->run(new RespondWithViewJob('dashboard::auth.login', ['item' => new Admin()]));
    }
}
