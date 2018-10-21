<?php

namespace App\Domains\Auth\Admin\Jobs;

use Illuminate\Support\Facades\DB;
use Lucid\Foundation\Job;

/**
 * Class RemoveResetTokenJob
 * @package App\Domains\Auth\Jobs\Admin
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class RemoveResetTokenJob extends Job
{
    /**
     * @var string
     */
    protected $token;

    /**
     * RemoveResetTokenJob constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Execute the jobs
     */
    public function handle()
    {
        $passwordRecoveryTable = config('auth.passwords.admins.table');

        /**
         * Delete old requests for password reset
         */
        DB::table($passwordRecoveryTable)->where([
            'token' => $this->token
        ])->delete();
    }
}
