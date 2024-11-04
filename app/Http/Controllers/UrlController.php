<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {   
        $shortUrl = ShortUrl::where("short_url", $request->url)->first();
        $shortUrl->increment("count");
        return response()->redirectTo($shortUrl->url);
    }
}
