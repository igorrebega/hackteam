<?php

namespace App\Domains\Auth\Admin\Jobs;

use Illuminate\Support\Facades\DB;
use Lucid\Foundation\Job;

/**
 * Class GetEmailByTokenJob
 * @package App\Domains\Auth\Jobs\Admin
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class GetEmailByTokenJob extends Job
{
    /**
     * @var string
     */
    protected $token;

    /**
     * GetEmailByTokenJob constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed|null
     */
    public function handle()
    {
        $passwordRecoveryTable = config('auth.passwords.admins.table');

        $record = DB::table($passwordRecoveryTable)->where([
            'token' => $this->token
        ])->first();

        if ($record) {
            return $record->email;
        }

        return null;
    }
}
