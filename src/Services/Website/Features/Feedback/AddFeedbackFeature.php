<?php
namespace App\Services\Website\Features\Feedback;

use Lucid\Foundation\Feature;
use App\Data\Repositories\ProductRankmojiRepository;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Data\Domains\Ranking\Jobs\CreateRankingJob;

class AddFeedbackFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $request->only([
            'productId',
            'angry',
            'sad',
            'neutral',
            'happy',
            'surprised'
        ]);
        extract($data);
        $this->run(new CreateRankingJob(
            $productId,
            $angry,
            $sad,
            $neutral,
            $happy,
            $surprised
        ));
        $data = $this->run(new GetRankingJob($productId));

        return $this->run(new RespondWithJsonJob([
            $data
        ]));
    }
}
