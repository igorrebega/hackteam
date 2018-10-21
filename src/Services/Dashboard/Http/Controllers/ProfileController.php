<?php

namespace App\Services\Dashboard\Http\Controllers;

use App\Services\Dashboard\Features\Profile\EditProfileFeature;
use App\Services\Dashboard\Features\Profile\UpdateProfileFeature;
use Lucid\Foundation\Http\Controller;

/**
 * Class ProfileController
 * @package App\Services\Dashboard\Http\Controllers
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        view()->share('menuActive', 'profile');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return $this->serve(EditProfileFeature::class);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        return $this->serve(UpdateProfileFeature::class);
    }
}
