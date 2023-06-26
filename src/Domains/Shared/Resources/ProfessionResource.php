<?php

declare(strict_types=1);

namespace Domains\Shared\Resources;

use Domains\Vendor\Resources\VendorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfessionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uuid,

            'type' => 'profession',

            'attributes' => [
                'title' => $this->title,
                'description' => $this->description,
            ],
        ];
    }
}
