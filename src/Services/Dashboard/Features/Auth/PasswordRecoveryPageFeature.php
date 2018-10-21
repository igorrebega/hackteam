<?php

namespace App\Services\Dashboard\Features\Auth;

use App\Domains\Auth\Admin\Jobs\GetEmailByTokenJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;

/**
 * Class PasswordRecoveryPageFeature
 * @package App\Services\Dashboard\Features\Auth
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class PasswordRecoveryPageFeature extends Feature
{
    /**
     * @var string
     */
    protected $token;

    /**
     * PasswordRecoveryPageFeature constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function handle()
    {
        $data = [];

        $email = $this->run(new GetEmailByTokenJob($this->token));

        if (!$email) {
            $data = [
                'validToken' => false,
                'message'    => 'Token is invalid or expired. Please try to make new reset password request'
            ];
        } else {
            $data = [
                'validToken' => true,
                'email'      => $email,
                'token'      => $this->token
            ];
        }

        return $this->run(new RespondWithViewJob('dashboard::auth.password-recovery', $data));
    }
}
