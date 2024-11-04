<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreShortUrlRequest;
use App\Http\Resources\Api\V2\ShortUrlResource;
use App\Models\ShortUrl;
use App\Traits\ApiResponses;

class ShortUrlController extends Controller
{
    use ApiResponses;

    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        $shortUrls = ShortUrl::where('user_id', '=', auth()->user()->id)->get();

        return $this->success('Short Url List', ShortUrlResource::collection($shortUrls), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShortUrlRequest $request)
    {
        $existUrl = ShortUrl::where('url', '=', $request->url)->first();

        if ($existUrl) {
            if (! $request->user()->shortUrls()->where('short_url_id', $existUrl->id)->exists()) {
                $request->user()->shortUrls()->attach($existUrl->id);
            }

            return $this->success('Short Url', new ShortUrlResource($existUrl), 200);
        }

        $shortUrl = ShortUrl::create([
            'user_id' => auth()->user()->id,
            'url' => $request->url,
            'short_url' => ShortUrl::generateShortUrl(),
        ]);

        return response()->json(['data' => new ShortUrlResource($shortUrl)], 201);
    }
}
