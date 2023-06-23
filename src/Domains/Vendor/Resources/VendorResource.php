<?php

declare(strict_types=1);

namespace Domains\Vendor\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uuid,

            'type' => 'vendor',

            'attributes' => [
                'name' => $this->name,
                'phone' => $this->phone,
                'balance' => $this->balance,
            ],

            'relationships' => [
                'businesses' => BusinessResource::collection(
                    resource: $this->whenLoaded(
                        relationship: 'businesses',
                    ),
                ),
            ],
        ];
    }
}
