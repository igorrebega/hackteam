<?php

namespace App\Services\Dashboard\Features\Auth;

use App\Domains\Admin\Jobs\FindAdminByEmailJob;
use App\Domains\Auth\Admin\Jobs\GetEmailByTokenJob;
use App\Domains\Auth\Admin\Jobs\RemoveResetTokenJob;
use App\Domains\Auth\Admin\Jobs\ResetPasswordByRequestJob;
use App\Services\Dashboard\Http\Requests\Auth\NewPasswordRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Lucid\Foundation\Feature;

/**
 * Class AcceptPasswordRecoveryFeature
 * @package App\Services\Dashboard\Features\Auth
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class AcceptPasswordRecoveryFeature extends Feature
{
    /**
     * @var string
     */
    protected $token;

    /**
     * AcceptPasswordRecoveryFeature constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @param NewPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(NewPasswordRequest $request)
    {
        $email = $this->run(new GetEmailByTokenJob($this->token));

        try {

            $admin = $this->run(new FindAdminByEmailJob($email));

        } catch (ModelNotFoundException $exception) {

            $this->run(new RemoveResetTokenJob($this->token));
            return redirect()->back()->with('no-admin-found', 'No admin found with this email');

        }

        $this->run(new ResetPasswordByRequestJob($request, $admin->id));

        $this->run(new RemoveResetTokenJob($this->token));

        return redirect()->route('auth.login')->with('password-reset-successfully',
            'Your password has been reset. Use new password to login');
    }
}
