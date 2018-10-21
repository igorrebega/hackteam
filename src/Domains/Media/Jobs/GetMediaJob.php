<?php

namespace App\Domains\Media\Jobs;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Lucid\Foundation\Job;

/**
 * Class GetMediaJob
 * @package App\Domains\Media
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class GetMediaJob extends Job
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

    public function handle()
    {
        $fileSystem = Storage::disk('media');

        if (!$fileSystem->exists($this->relativePath)) {
            abort(404);
        }

        $path = $fileSystem->path($this->relativePath);
        $file = File::get($path);
        $type = File::mimeType($path);
        $size = File::size($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        $response->header("Content-Length", $size);

        return $response;
    }
}