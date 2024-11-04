<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShortUrlResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'short_url',
            'id' => $this->id,
            'attributes' => [
                'short_url' => route('short_url.redirect', ['url' => $this->short_url], ['absolute' => 1]),
            ],
        ];
    }
}
