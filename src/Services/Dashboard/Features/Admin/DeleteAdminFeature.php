<?php

namespace App\Services\Dashboard\Features\Admin;

use App\Domains\Admin\Jobs\DeleteAdminJob;
use Lucid\Foundation\Feature;

/**
 * Class DeleteAdminFeature
 * @package App\Services\Dashboard\Features\Admin
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class DeleteAdminFeature extends Feature
{
    /**
     * @var int
     */
    protected $adminId;

    /**
     * DeleteAdminFeature constructor.
     * @param int $adminId
     */
    public function __construct(int $adminId)
    {
        $this->adminId = $adminId;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle()
    {
        $result = $this->run(new DeleteAdminJob($this->adminId));

        if (!$result) {
            return redirect()->back()->with('ntf-danger', 'Error has been occurred while deleting');
        }

        return redirect()->route('admins')->with('ntf-success', 'Admin has been successfully deleted');
    }
}
