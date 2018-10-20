<?php

namespace App\Services\Website\Http\Controllers;

use App\Services\Webshop\Features\Media\GetMediaFeature;
use Lucid\Foundation\Http\Controller;

/**
 * Class MediaController
 * @package App\Services\Website\Http\Controllers
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class MediaController extends Controller
{
    /**
     * @param string $relativePath
     * @return \Illuminate\Http\Response
     */
    public function getMedia(string $relativePath)
    {
        return $this->serve(GetMediaFeature::class, [
            'relativePath' => $relativePath
        ]);
    }
}
