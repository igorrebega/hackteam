<?php

namespace App\Domains\Auth\Admin\Jobs;

use App\Services\Dashboard\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Lucid\Foundation\Job;

/**
 * Class LoginAdminJob
 * @package App\Domains\Auth\Jobs
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class LoginAdminJob extends Job
{
    /**
     * @var LoginRequest
     */
    protected $request;

    /**
     * LoginAdminJob constructor.
     * @param LoginRequest $request
     */
    public function __construct(LoginRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle()
    {
        return Auth::attempt(
            [
                'email'    => $this->request->get('email'),
                'password' => $this->request->get('password')
            ],
            $this->request->has('remember')
        );
    }
}
