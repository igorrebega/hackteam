<?php

namespace App\Services\Website\Features\Product;

use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;

class ViewProductFeature extends Feature
{
    public function handle()
    {
        return $this->dispatchNow(new RespondWithViewJob('website::product.view'));
    }
}
