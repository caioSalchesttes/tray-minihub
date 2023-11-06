<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('product', [\App\Http\Controllers\WebHookController::class, 'handle']);
