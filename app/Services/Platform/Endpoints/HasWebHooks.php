<?php

namespace App\Services\Platform\Endpoints;

trait HasWebHooks
{
    public function webhooks() : WebHooks
    {
        return new WebHooks();
    }
}
