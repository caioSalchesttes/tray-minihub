<?php

namespace App\Services\Platform;

use App\Services\Platform\Endpoints\HasProducts;
use App\Services\Platform\Endpoints\HasWebHooks;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class PlatformService
{
    use HasProducts;
    use HasWebHooks;
    protected $api;
    public function __construct()
    {
        $this->api = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->baseUrl($this->getTrayConfig('url'));
    }

    public function getApi(): PendingRequest
    {
        return $this->api;
    }
    private function getTrayConfig(string $key)
    {
        return config("tray.$key") ?? null;
    }
}
