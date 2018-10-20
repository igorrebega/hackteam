<?php

namespace App\Services\Webshop\Features\Media;

use App\Domains\Media\Jobs\GetMediaJob;
use Lucid\Foundation\Feature;

/**
 * Class GetMediaFeature
 * @package App\Services\Webshop\Features\Media
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class GetMediaFeature extends Feature
{
    /**
     * @var string
     */
    protected $relativePath;

    /**
     * GetMediaFeature constructor.
     * @param string $relativePath
     */
    public function __construct(string $relativePath)
    {
        $this->relativePath = $relativePath;
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        return $this->run(new GetMediaJob($this->relativePath));
    }
}