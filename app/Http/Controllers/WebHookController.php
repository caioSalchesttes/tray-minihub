<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebHookRequest;
use App\Services\WebHook\Facades\WebHook;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class WebHookController extends Controller
{
    public function handle(WebHookRequest $request): JsonResponse
    {
       return WebHook::sync((int) $request->only('product_ref')['product_ref']);
    }
}
