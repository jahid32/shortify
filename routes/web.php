<?php

use App\Models\ShortUrl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

Route::get('/{url}', [UrlController::class, '__invoke'])->name('short_url.redirect');
