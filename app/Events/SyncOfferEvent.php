<?php

namespace App\Events;

use App\Models\Offer;
use App\Services\Platform\Entities\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SyncOfferEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public string $reference;
    public function __construct(string $reference)
    {
        $this->reference = $reference;
    }
}
