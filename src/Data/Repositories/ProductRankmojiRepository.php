<?php

namespace App\Data\Repositories;

use App\Data\Models\ProductRankmoji;

/**
 * Class ProductRankmojiRepository
 * @author Oleh Hrynkiv <o.grynkiv@bvblogic.com>
 */
class ProductRankmojiRepository extends Repository
{
    const EMOJEES = [
        'angry' => 1,
        'sad' => 2,
        'neutral' => 3,
        'happy' => 4,
        'surprised' => 5,
    ];

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
        $attributes['overall_emoji'] = self::getEmojeeWeight($key);
        foreach ($rankValues as $key => $value) {
            $rankValues[$key] = $rankValues[$key] * self::getEmojeeWeight($key);
        }
        $attributes['overall_rank'] = array_sum($rankValues);
        parent::fillAndSave($attributes);
    }

    /**
     * @param string $key
     * @return int
     */
    public static function getEmojeeWeight(string $key)
    {
        return isset(self::EMOJEES[$key]) ? self::EMOJEES[$key] : null;
    }

    /**
     * @param int $weight
     * @return string
     */
    public static function getEmojeeValue(int $weight)
    {
        $data = self::EMOJEES;
        array_flip($data);
        return isset($data[$weight]) ? $data[$weight] : null;
    }

}