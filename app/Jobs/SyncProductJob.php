<?php

namespace App\Jobs;

use App\Services\WebHook\Facades\WebHook;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $product_ref;

    /**
     * Create a new job instance.
     */
    public function __construct(int $product_ref)
    {
        $this->product_ref = $product_ref;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        WebHook::validateProduct($this->product_ref);
    }
}
