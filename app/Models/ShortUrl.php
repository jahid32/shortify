<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class ShortUrl extends Model
{
    protected $guarded = [];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public static function generateShortUrl($length = 6)
    {
        $shortCode = Str::random($length);
        if (ShortUrl::where('short_url', $shortCode)->exists()) {
            self::generateShortUrl();
        }

        return $shortCode;
    }
}
