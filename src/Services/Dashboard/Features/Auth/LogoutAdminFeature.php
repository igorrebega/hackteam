<?php

namespace App\Services\Dashboard\Features\Auth;

use App\Domains\Auth\Admin\Jobs\LogoutAdminJob;
use Lucid\Foundation\Feature;

/**
 * Class LogoutAdminFeature
 * @package App\Services\Dashboard\Features\Auth
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class LogoutAdminFeature extends Feature
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle()
    {
        $this->run(new LogoutAdminJob());

        return redirect()->route('auth.login');
    }
}
