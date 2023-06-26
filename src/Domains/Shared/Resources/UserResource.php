<?php

declare(strict_types=1);

namespace Domains\Shared\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Domains\Vendor\Resources\VendorResource;
use Illuminate\Http\Request;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uuid,

            'type' => 'user',

            'attributes' => [
                'username' => $this->username,
            ],

            'relationships' => [
                'profession' => new ProfessionResource(
                    resource: $this->whenLoaded(
                        relationship: 'profession',
                    ),
                ),

                // 'customer' => new CustomerResource(
                //     resource: $this->whenLoaded(
                //         relationship: 'customer',
                //     ),
                // ),

                'vendor' => new VendorResource(
                    resource: $this->whenLoaded(
                        relationship: 'vendor',
                    ),
                ),
            ],
        ];
    }
}
