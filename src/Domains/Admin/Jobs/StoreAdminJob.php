<?php

namespace App\Domains\Admin\Jobs;

use App\Data\Repositories\AdminRepository;
use App\Services\Dashboard\Http\Requests\Admin\StoreAdminRequest;
use Illuminate\Support\Facades\Hash;
use Lucid\Foundation\Job;

/**
 * Class StoreAdminJob
 * @package App\Domains\Admin\Jobs
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class StoreAdminJob extends Job
{
    /**
     * @var StoreAdminRequest
     */
    protected $request;

    /**
     * StoreAdminJob constructor.
     * @param StoreAdminRequest $request
     */
    public function __construct(StoreAdminRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     * @param AdminRepository $adminRepository
     * @return mixed
     */
    public function handle(AdminRepository $adminRepository)
    {
        $attributes = $this->request->only(['name', 'surname', 'email']);
        $attributes['password'] = Hash::make($this->request->get('password'));

        return $adminRepository->fillAndSave($attributes);
    }
}
