<?php
namespace App\Services\Website\Features\Feedback;

use Lucid\Foundation\Feature;
use App\Data\Repositories\ProductRankmojiRepository;
use App\Domains\Http\Jobs\RespondWithJsonJob;

class AddFeedbackFeature extends Feature
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
     * Create a new feature instance.
     * string $slug
     * @return void
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

        return $this->run(new RespondWithJsonJob('website::store.category.index',
            [

            ]));
    }
}
