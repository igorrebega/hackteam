<?php
namespace App\Data\Domains\Ranking\Jobs;

use App\Data\Repositories\ProductRankmojiRepository;
use App\Data\Repositories\ProductRepository;
use Lucid\Foundation\Job;

class CreateRankingJob extends Job
{
    /**
     * @var int
     */
    private $productId;
    /**
     * @var float
     */
    private $angry;
    /**
     * @var float
     */
    private $sad;
    /**
     * @var float
     */
    private $neutral;
    /**
     * @var float
     */
    private $happy;
    /**
     * @var float
     */
    private $surprised;

    /**
     * @param int $productId
     * @param float $angry
     * @param float $sad
     * @param float $neutral
     * @param float $happy
     * @param float $surprised
     */
    public function __construct(
        int $productId,
        float $angry,
        float $sad,
        float $neutral,
        float $happy,
        float $surprised
    ) {
        $this->productId = $productId;
        $this->angry = $angry;
        $this->sad = $sad;
        $this->happy = $happy;
        $this->neutral = $neutral;
        $this->surprised = $surprised;
    }

    /**
     * @param ProductRepository $productRepository
     * @param ProductRankmojiRepository $productRankmojiRepository
     */
    public function handle(
        ProductRepository $productRepository,
        ProductRankmojiRepository $productRankmojiRepository
    ) {
        $product = $productRepository->find($this->productId);
        $productRankmojiRepository->fillAndSave([
            'angry'      => $this->angry,
            'sad'        => $this->sad,
            'neutral'    => $this->neutral,
            'happy'      => $this->happy,
            'surprised'  => $this->surprised,
            'product_id' => $product->id
        ]);
    }
}
