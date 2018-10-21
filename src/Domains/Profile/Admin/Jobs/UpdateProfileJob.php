<?php

namespace App\Domains\Profile\Admin\Jobs;

use App\Data\Repositories\AdminRepository;
use App\Services\Dashboard\Http\Requests\Profile\ProfileRequest;
use Illuminate\Support\Facades\Hash;
use Lucid\Foundation\Job;

/**
 * Class UpdateProfileJob
 * @package App\Domains\Profile\Jobs\Profile
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class UpdateProfileJob extends Job
{
    /**
     * @var ProfileRequest
     */
    protected $request;

    /**
     * @var int
     */
    protected $adminId;

    /**
     * UpdateProfileJob constructor.
     * @param ProfileRequest $request
     * @param int $adminId
     */
    public function __construct(ProfileRequest $request, int $adminId)
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
