<?php

declare (strict_types = 1);

namespace Domains\Shared\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uuid,
            'type' => 'user',
            'attributes' => [
                'username' => $this->username,
                'email' => $this->email
            ],
        ];
    }
}
