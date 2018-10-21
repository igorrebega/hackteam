<?php

namespace App\Domains\Auth\Admin\Jobs;

use App\Data\Repositories\AdminRepository;
use App\Services\Dashboard\Http\Requests\Auth\NewPasswordRequest;
use Illuminate\Support\Facades\Hash;
use Lucid\Foundation\Job;

/**
 * Class ResetPasswordByRequestJob
 * @package App\Domains\Auth\Jobs\Admin
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class ResetPasswordByRequestJob extends Job
{
    /**
     * @var NewPasswordRequest
     */
    protected $request;

    /**
     * @var int
     */
    protected $adminId;

    /**
     * ResetPasswordByRequestJob constructor.
     * @param NewPasswordRequest $request
     * @param int $adminId
     */
    public function __construct(NewPasswordRequest $request, int $adminId)
    {
        $this->request = $request;
        $this->adminId = $adminId;
    }

    /**
     * @param AdminRepository $adminRepository
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle(AdminRepository $adminRepository)
    {
        $attributes = [
            'password' => Hash::make($this->request->get('password'))
        ];

        return $adminRepository->update($this->adminId, $attributes);
    }
}
