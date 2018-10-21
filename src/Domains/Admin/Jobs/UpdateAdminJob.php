<?php

namespace App\Domains\Admin\Jobs;

use App\Data\Repositories\AdminRepository;
use App\Services\Dashboard\Http\Requests\Admin\UpdateAdminRequest;
use Illuminate\Support\Facades\Hash;
use Lucid\Foundation\Job;

/**
 * Class UpdateAdminJob
 * @package App\Domains\Admin\Jobs
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class UpdateAdminJob extends Job
{
    /**
     * @var UpdateAdminRequest
     */
    protected $request;

    /**
     * @var int
     */
    protected $adminId;

    /**
     * UpdateAdminJob constructor.
     * @param UpdateAdminRequest $request
     * @param int $adminId
     */
    public function __construct(UpdateAdminRequest $request, int $adminId)
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
        $attributes = $this->request->only(['name', 'surname', 'email']);

        if (!is_null($this->request->get('password'))) {
            $attributes['password'] = Hash::make($this->request->get('password'));
        }

        return $adminRepository->update($this->adminId, $attributes);
    }
}
