<?php

declare (strict_types = 1);

namespace Domains\Customer\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'uuid' => $this->uuid,
            'type' => 'user',
            'username' => $this->username,
            'email' => $this->email
        ];
    }
}
