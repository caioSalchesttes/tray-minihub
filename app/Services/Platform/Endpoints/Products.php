<?php

namespace App\Services\Platform\Endpoints;
use App\Services\Platform\Entities\Product;
use Illuminate\Support\Collection;

class Products extends BaseEndpoint
{
    public function find(int $reference) : Product|null
    {
        $get = $this->service->getApi()->get('products/'.$reference)->json();

        if(!isset($get)){
            return null;
        }

        return $this->transform($this->service->getApi()->get('products/'.$reference)->json(),Product::class)['data'];
    }
}
