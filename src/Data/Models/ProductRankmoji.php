<?php

namespace App\Data\Models;

/**
 * Class ProductRankmoji
 * @author Oleh Hrynkiv <o.grynkiv@bvblogic.com>
 */
class ProductRankmoji extends Model
{
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
    protected $fillable = [
        'angry',
        'sad',
        'neutral',
        'happy',
        'surprised',
        'overall_emoji',
        'overall_rank',
    ];
}
