<?php

namespace App\Services\Platform\Endpoints;

use App\Services\Platform\PlatformService;
use Illuminate\Support\Collection;

class BaseEndpoint
{
    protected PlatformService $service;

    public function __construct()
    {
        $this->service = new PlatformService();
    }

    protected function transform(mixed $json, string $entity): Collection
    {
        return collect($json)
            ->map(fn ($pd) => new $entity($pd));
    }
}
