<?php

namespace App\Services\Dashboard\Features\Auth;

use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;

/**
 * Class PasswordRecoveryRequestPageFeature
 * @package App\Services\Dashboard\Features\Auth
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class PasswordRecoveryRequestPageFeature extends Feature
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function handle()
    {
        return $this->run(new RespondWithViewJob('dashboard::auth.password-recovery-request'));
    }
}
