<?php

namespace App\Data\Repositories;

use App\Data\Models\ProductRankmoji;

/**
 * Class ProductRankmojiRepository
 * @author Oleh Hrynkiv <o.grynkiv@bvblogic.com>
 */
class ProductRankmojiRepository extends Repository
{
    /**
     * @return string
     */
    protected function model()
    {
        return ProductRankmoji::class;
    }

    public function fillAndSave($attributes)
    {
        $rankValues = array_intersect_keys($attributes, [
            'angry' => 0,
            'sad' => 0,
            'neutral' => 0,
            'happy' => 0,
            'surprised' => 0,
        ]);
        asort($rankValues);
        reset($rankValues);
        $key = key($rankValues);
        $attributes['overall_emoji'] = ProductRankmoji::getEmojeeWeight($key);
        foreach ($rankValues as $key => $value) {
            $rankValues[$key] = $rankValues[$key] * ProductRankmoji::getEmojeeWeight($key);
        }
        $attributes['overall_rank'] = array_sum($rankValues);
        parent::fillAndSave($attributes);
    }

    /**
     *
     * @param int $productId
     * @return Collection
     */
    public function getOveralCountByProduct($productId)
    {
        return $this->model->selectRaw('overall_emoji, COUNT(id) as count')
            ->where('prpoduct_id', $productI)
            ->groupBy('ovarall_emoji');
    }

}