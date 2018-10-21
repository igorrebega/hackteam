<?php

namespace App\Services\Dashboard\Features\Admin;

use App\Domains\Admin\Jobs\StoreAdminJob;
use App\Services\Dashboard\Http\Requests\Admin\StoreAdminRequest;
use Lucid\Foundation\Feature;

/**
 * Class StoreAdminFeature
 * @package App\Services\Backend\Features\Admin
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class StoreAdminFeature extends Feature
{
    /**
     * @param StoreAdminRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(StoreAdminRequest $request)
    {
        $result = $this->run(new StoreAdminJob($request));

        if (!$result) {
            return redirect()->back()->with('ntf-danger', 'Error has been occurred while saving');
        }

        return redirect()->route('admins')->with('ntf-success', 'Admin has been successfully created');
    }
}
