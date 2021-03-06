<?php

namespace App\Domains\Admin\Jobs;

use App\Data\Repositories\AdminRepository;
use Lucid\Foundation\Job;

/**
 * Class GetAdminsJob
 * @package App\Domains\Admin\Jobs
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class GetAdminsJob extends Job
{
    /**
     * @param AdminRepository $adminRepository
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function handle(AdminRepository $adminRepository)
    {
        return $adminRepository->all();
    }
}
