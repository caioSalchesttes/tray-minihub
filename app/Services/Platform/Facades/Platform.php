<?php

namespace App\Services\Platform\Facades;

use App\Services\Platform\PlatformService;
use Illuminate\Support\Facades\Facade;

class Platform extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return PlatformService::class;
    }
}
