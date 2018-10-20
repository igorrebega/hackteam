<?php

namespace App\Data\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Product
 * @package App\Data\Models
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class Product extends Model implements HasMedia
{
    const MEDIA_COLLECTION_IMAGES = 'images';

    use HasMediaTrait;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->getFirstMediaUrl(self::MEDIA_COLLECTION_IMAGES);
    }
}
