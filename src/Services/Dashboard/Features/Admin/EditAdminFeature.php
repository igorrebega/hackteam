<?php

namespace App\Services\Dashboard\Features\Admin;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Admin\Jobs\FindAdminByIdJob;
use Lucid\Foundation\Feature;

/**
 * Class EditAdminFeature
 * @package App\Services\Backend\Features\Admin
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class EditAdminFeature extends Feature
{
    /**
     * @var int
     */
    protected $adminId;

    /**
     * EditAdminFeature constructor.
     * @param int $adminId
     */
    public function __construct(int $adminId)
    {
        $this->adminId = $adminId;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function handle()
    {
        $admin = $this->run(new FindAdminByIdJob($this->adminId));

        return $this->run(new RespondWithViewJob('dashboard::admin.edit',
            [
                'item' => $admin
            ]
        ));
    }
}
