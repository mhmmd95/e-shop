<?php

declare (strict_types = 1);

namespace Domains\Vendor\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uuid,

            'type' => 'business',

            'attributes' => [
                'name' => $this->name,
                'description' => $this->description,
            ],

            'relationships' => [
                // 'categories' => new CategoryResource(
                //     resource: $this->whenLoaded(
                //         relationship: 'categories',
                //     ),
                // ),
            ],
        ];
    }
}
