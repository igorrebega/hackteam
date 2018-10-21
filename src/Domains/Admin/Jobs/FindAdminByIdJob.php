<?php

namespace App\Domains\Admin\Jobs;

use App\Data\Repositories\AdminRepository;
use Lucid\Foundation\Job;

/**
 * Class FindAdminByIdJob
 * @package App\Domains\Admin\Jobs
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class FindAdminByIdJob extends Job
{
    /**
     * @var int
     */
    protected $adminId;

    /**
     * FindAdminByIdJob constructor.
     * @param int $adminId
     */
    public function __construct(int $adminId)
    {
        $this->adminId = $adminId;
    }

    /**
     * @param AdminRepository $adminRepository
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle(AdminRepository $adminRepository)
    {
        return $adminRepository->find($this->adminId);
    }
}
