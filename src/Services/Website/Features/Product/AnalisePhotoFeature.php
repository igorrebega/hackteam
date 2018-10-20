<?php

namespace App\Services\Website\Features\Product;

use App\Domains\Profile\Admin\Jobs\AnalisePhotoJob;
use App\Domains\Profile\Admin\Jobs\SaveWebcamPhotoJob;
use Lucid\Foundation\Feature;

class AnalisePhotoFeature extends Feature
{
    /**
     * @var
     */
    private $productId;

    /**
     * AnalisePhotoFeature constructor.
     * @param $productId
     */
    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    public function handle()
    {
        $image = $this->dispatchNow(new SaveWebcamPhotoJob(
            \request('imgBase64')
        ));

        $emotionData = $this->dispatchNow(new AnalisePhotoJob(
            $this->productId,
            $image
        ));



        return $emotionData;
    }
}
