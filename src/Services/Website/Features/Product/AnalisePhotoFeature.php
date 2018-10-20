<?php

namespace App\Services\Website\Features\Product;

use App\Domains\Ranking\Jobs\CreateRankmojiJob;
use App\Domains\Ranking\Jobs\GetRankingJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
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
        $image = $this->run(new SaveWebcamPhotoJob(
            \request('imgBase64')
        ));

        $emotionData = $this->run(new AnalisePhotoJob(
            $this->productId,
            $image
        ));

        $this->run(new CreateRankmojiJob(
            $this->productId,
            $emotionData['anger'],
            $emotionData['sadness'],
            $emotionData['neutral'],
            $emotionData['happiness'],
            $emotionData['surprise']
        ));

        $newData = $this->run(new GetRankingJob($this->productId));

        return $this->run(new RespondWithJsonJob($newData));
    }
}
