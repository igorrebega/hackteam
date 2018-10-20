<?php

namespace App\Services\Dashboard\Features\Admin;

use App\Domains\Admin\Jobs\UpdateAdminJob;
use App\Services\Dashboard\Http\Requests\Admin\UpdateAdminRequest;
use Lucid\Foundation\Feature;

/**
 * Class UpdateAdminFeature
 * @package App\Services\Backend\Features\Admin
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class UpdateAdminFeature extends Feature
{
    /**
     * @var int
     */
    protected $adminId;

    /**
     * UpdateAdminFeature constructor.
     * @param int $adminId
     */
    public function __construct(int $adminId)
    {
        $this->adminId = $adminId;
    }

    /**
     * @param UpdateAdminRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(UpdateAdminRequest $request)
    {
        $result = $this->run(new UpdateAdminJob($request, $this->adminId));

        if (!$result) {
            return redirect()->back()->with('ntf-danger', 'Error has been occurred while saving');
        }

        return redirect()->route('admins')->with('ntf-success', 'Admin has been successfully created');
    }
}
