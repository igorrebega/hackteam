<?php

namespace App\Domains\Ranking\Jobs;

use App\Data\Models\ProductRankmoji;
use App\Data\Repositories\ProductRankmojiRepository;
use Lucid\Foundation\Job;

class GetRankingJob extends Job
{
    /**
     * @var int
     */
    private $productId;

    /**
     * @param int $productId
     */
    public function __construct(int $productId) {
        $this->productId = $productId;
    }

    /**
     * @param ProductRankmojiRepository $productRankmojiRepository
     * @return array
     */
    public function handle(ProductRankmojiRepository $productRankmojiRepository)
    {
        $numbersToIndexes = array_flip(ProductRankmoji::EMOJEES);

        $overal = $productRankmojiRepository->getOveralCountByProduct($this->productId);

        $total = [
            'angry'     => 0,
            'sad'       => 0,
            'neutral'   => 0,
            'happy'     => 0,
            'surprised' => 0,
        ];

        foreach ($overal as $value) {
            $indexName = $numbersToIndexes[$value->overall_emoji];

            $total[$indexName] = $value['count'];
        }

        return $total;
    }
}
