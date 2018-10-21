<?php

namespace App\Domains\Auth\Admin\Jobs;

use Illuminate\Support\Facades\Auth;
use Lucid\Foundation\Job;

/**
 * Class LogoutAdminJob
 * @package App\Domains\Auth\Jobs\Admin
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class LogoutAdminJob extends Job
{
    /**
     * Log out current user
     */
    public function handle()
    {
        Auth::logout();
    }
}
