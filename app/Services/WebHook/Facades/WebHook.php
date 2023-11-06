<?php

namespace App\Services\WebHook\Facades;

use App\Services\WebHook\WebHookService;
use Illuminate\Support\Facades\Facade;

class WebHook extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return WebHookService::class;
    }
}
