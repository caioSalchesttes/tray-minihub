<?php

use App\Services\Platform\Facades\Platform;
use Illuminate\Support\Facades\Route;

Route::get('/healthcheck', function () {
    return [
        'status' => 'ok',
        'timestamp' => now()->toDateTimeString(),
        'version' => '1.0.0',
    ];
});
