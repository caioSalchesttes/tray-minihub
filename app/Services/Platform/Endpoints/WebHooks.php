<?php

namespace App\Services\Platform\Endpoints;
use App\Services\Platform\Entities\Product;
use Illuminate\Support\Collection;

class WebHooks extends BaseEndpoint
{
    public function store(string $offer_ref): bool
    {
        return $this->service->getApi()->post('webhook', [
            'offer_ref' => $offer_ref
        ])->status() === 200;
    }
}
