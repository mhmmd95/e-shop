<?php

declare (strict_types = 1);

namespace Domains\Vendor\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uuid,

            'type' => 'category',

            'attributes' => [
                'name' => $this->name,
                'description' => $this->description,
            ],

            'relationships' => [
                // 'products' => ProductResource::collection(
                //     resource: $this->whenLoaded(
                //         relationship: 'products',
                //     ),
                // ),
            ],
        ];
    }
}
