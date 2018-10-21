<?php

namespace App\Domains\Profile\Admin\Jobs;

use Lucid\Foundation\Job;

class SaveWebcamPhotoJob extends Job
{
    /**
     * @var
     */
    private $photo;

    /**
     * UpdateProfileJob constructor.
     * @param $photo
     */
    public function __construct($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function handle()
    {
        $data = $this->photo;
        if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
            $data = substr($data, strpos($data, ',') + 1);
            $type = strtolower($type[1]); // jpg, png, gif

            if (! \in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                throw new \Exception('invalid image type');
            }

            $data = base64_decode($data);

            $name = time() . \random_int(1, 100) . '.png';


            \Storage::disk('cam')->put($name, $data);

            if ($data === false) {
                throw new \RuntimeException('base64_decode failed');
            }

            return 'cam/' . $name;
        }

        throw new \RuntimeException('did not match data URI with image data');
    }
}
