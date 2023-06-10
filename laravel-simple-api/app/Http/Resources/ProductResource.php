<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'description' => substr($this->description, 0, 50) . '...',
            'price' => number_format($this->price / 100, 2),
            'category' => new CategoryResource($this->category),
        ];
    }
}
