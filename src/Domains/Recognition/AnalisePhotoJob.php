<?php

namespace App\Domains\Profile\Admin\Jobs;

use GuzzleHttp\Client;
use Lucid\Foundation\Job;

class AnalisePhotoJob extends Job
{
    /**
     * @var
     */
    private $productId;

    /**
     * @var
     */
    private $photo;

    /**
     * UpdateProfileJob constructor.
     * @param $productId
     * @param $photo
     */
    public function __construct($productId, $photo)
    {
        $this->productId = $productId;
        $this->photo = $photo;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function handle()
    {
        $client = new Client();

        $res = $client->post('https://westcentralus.api.cognitive.microsoft.com/face/v1.0/detect', [
            'query'   => [
                'returnFaceId'         => 'true',
                'returnFaceLandmarks'  => 'false',
                'returnFaceAttributes' => 'emotion'
            ],
            'json'    => [
                'url' => 'http://techbeat.com/wp-content/uploads/2013/06/o-GOOGLE-FACIAL-RECOGNITION-facebook-1024x767.jpg'
            ],
            'headers' => [
                // Request headers
                'content-type'              => 'application/json',

                // NOTE: Replace the "Ocp-Apim-Subscription-Key" value with a valid subscription key.
                'Ocp-Apim-Subscription-Key' => 'fc00e1ff3bfc4094b1588b92030403a9',
            ]
        ]);

        $response = $res->getBody()->getContents();

        return json_decode($response, true)[0]['faceAttributes']['emotion'];
    }
}
