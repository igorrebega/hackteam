<?php

namespace App\Data\Domains\Ranking\Jobs;

use App\Data\Repositories\ProductRankmojiRepository;
use Lucid\Foundation\Job;

class CreateRankingJob extends Job
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
        return $productRankmojiRepository->getOveralCountByProduct($this->productId)->toArray();
    }
}
