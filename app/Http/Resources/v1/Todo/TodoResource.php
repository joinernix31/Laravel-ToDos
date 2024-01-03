<?php

namespace App\Http\Resources\v1\Todo;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
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
            'Todo' => $this->title,
            'Category' => $this->category->name,
            'Color' => $this->category->color,
        ];
    }
}
