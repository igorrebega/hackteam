<?php

namespace App\Data\Models;

/**
 * Class ProductRankmoji
 * @author Oleh Hrynkiv <o.grynkiv@bvblogic.com>
 */
class ProductRankmoji extends Model
{

    public $timestamps = false;
    const EMOJEES = [
        'angry' => 1,
        'sad' => 2,
        'neutral' => 3,
        'happy' => 4,
        'surprised' => 5,
    ];

    /**
     * @var string
     */
    protected $table = 'product_rankmoji';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
