<?php

namespace App\Services\Dashboard\Features\Auth;

use App\Domains\Admin\Jobs\FindAdminByEmailJob;
use App\Domains\Auth\Admin\Jobs\SendPasswordRecoveryLetterJob;
use App\Services\Dashboard\Http\Requests\Auth\PasswordRecoveryRequest;
use Lucid\Foundation\Feature;

/**
 * Class AcceptPasswordRecoveryRequestFeature
 * @package App\Services\Dashboard\Features\Auth
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class AcceptPasswordRecoveryRequestFeature extends Feature
{
    /**
     * @param PasswordRecoveryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(PasswordRecoveryRequest $request)
    {
        $admin = $this->run(new FindAdminByEmailJob($request->get('email')));

        $this->run(new SendPasswordRecoveryLetterJob($request, $admin));

        return redirect()->back()->with(
            'recovery-letter-sent',
            'We sent letter to your email with further instructions, check your mailbox to get to know how to reset your password'
        );
    }
}
