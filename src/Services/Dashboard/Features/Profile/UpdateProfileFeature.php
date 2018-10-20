<?php

namespace App\Services\Dashboard\Features\Profile;

use App\Domains\Profile\Admin\Jobs\UpdateProfileJob;
use App\Services\Dashboard\Http\Requests\Profile\ProfileRequest;
use Lucid\Foundation\Feature;

/**
 * Class UpdateProfileFeature
 * @package App\Services\Dashboard\Features\Profile
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class UpdateProfileFeature extends Feature
{
    /**
     * @param ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(ProfileRequest $request)
    {
        $result = $this->run(new UpdateProfileJob($request, auth()->user()->id));

        if (!$result) {
            return redirect()->back()->with('ntf-danger', 'Error has been occurred while saving');
        }

        return redirect()->route('profile.edit')->with('ntf-success', 'Profile has been successfully updated');
    }
}
