<?php

namespace App\Services\WebHook;

use App\Enums\ProductEnum;
use App\Events\SyncOfferEvent;
use App\Jobs\SyncProductJob;
use App\Models\Product;
use App\Services\BaseService;
use App\Services\Platform\Facades\Platform;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WebHookService extends BaseService
{
    public function sync(int $product_ref): JsonResponse
    {
        SyncProductJob::dispatch($product_ref);

        return $this->sendResponse([], 'Product sync queued successfully.');
    }

    public function validateProduct(int $product_ref): void
    {
        try {
            $product = $this->fetchPlatformProduct($product_ref);

            if (!$product) {
                return;
            }

            DB::transaction(function () use ($product) {
                $this->updateProduct($product);
                $this->updateAndSyncOffers($product);
            });

        } catch (\Exception $exception) {
            $this->logError($exception);
        }
    }
    protected function fetchPlatformProduct(int $product_ref): ?object
    {
        return Platform::products()->find($product_ref);
    }

    protected function updateProduct(object $product): void
    {
        $modelProduct = Product::where('reference', $product->reference)->first();

        if (!$modelProduct) {
            return;
        }

        $modelProduct->update([
            'status' => $product->status,
            'title' => $product->title,
            'price' => $product->price,
            'quantity' => $product->quantity,
            'promotional_price' => $product->promotional_price,
            'promotion_starts_on' => $product->promotion_starts_on,
            'promotion_ends_on' => $product->promotion_ends_on,
        ]);
    }

    protected function updateAndSyncOffers(object $product): void
    {
        $modelProduct = Product::where('reference', $product->reference)->first();

        if (!$modelProduct || !$modelProduct->offers()->exists()) {
            return;
        }

        foreach ($modelProduct->offers as $offer) {
            $offer->update([
                'status' => $product->status,
                'price' => $product->price,
                'stock' => $product->quantity,
                'sale_price' => $product->promotional_price,
                'sale_starts_on' => $product->promotion_starts_on,
                'sale_ends_on' => $product->promotion_ends_on,
            ]);

            event(new SyncOfferEvent($offer->reference));
        }
    }

    protected function logError(\Exception $exception): void
    {
        $this->log('Error on validate product', [
            'message' => $exception->getMessage(),
            'line' => $exception->getLine(),
            'file' => $exception->getFile(),
        ]);
    }
}
