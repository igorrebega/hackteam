<?php

namespace App\Services\Dashboard\Http\Controllers;

use App\Services\Dashboard\Features\Admin\CreateAdminFeature;
use App\Services\Dashboard\Features\Admin\DeleteAdminFeature;
use App\Services\Dashboard\Features\Admin\EditAdminFeature;
use App\Services\Dashboard\Features\Admin\StoreAdminFeature;
use App\Services\Dashboard\Features\Admin\UpdateAdminFeature;
use App\Services\Dashboard\Features\Admin\AdminListFeature;
use Lucid\Foundation\Http\Controller;

/**
 * Class AdminController
 * @package App\Services\Dashboard\Http\Controllers
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        view()->share('menuActive', 'admins');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(AdminListFeature::class);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->serve(CreateAdminFeature::class);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        return $this->serve(StoreAdminFeature::class);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->serve(EditAdminFeature::class, [
            'adminId' => (int)$id
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        return $this->serve(UpdateAdminFeature::class, [
            'adminId' => (int)$id
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        return $this->serve(DeleteAdminFeature::class, [
            'adminId' => (int)$id
        ]);
    }
}
