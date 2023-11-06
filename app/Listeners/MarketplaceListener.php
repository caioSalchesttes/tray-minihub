<?php

namespace App\Listeners;

use App\Events\SyncOfferEvent;
use App\Services\Platform\Entities\Product;
use App\Services\Platform\Facades\Platform;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MarketplaceListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SyncOfferEvent $event): void
    {
        Platform::webhooks()->store($event->reference);
    }
}
