<?php

namespace App\Http\Resources\v2\Category;

use App\Http\Resources\v2\Todo\TodoCollection;
use App\Http\Resources\v2\Todo\TodoResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'Category' => $this->name,
            'Color' => $this->color,
            'Todos' => new TodoCollection($this->todos)
        ];
    }
}
