<?php

use App\Http\Controllers\Api\V2\ShortUrlController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('/short-url', ShortUrlController::class);
});
