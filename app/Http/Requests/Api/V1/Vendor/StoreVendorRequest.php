<?php

declare (strict_types = 1);

namespace App\Http\Requests\Api\V1\Vendor;

use Domains\Shared\Requests\Concerns\OverrideFailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class StoreVendorRequest extends FormRequest
{
    use OverrideFailedValidation;

    public function rules(): array
    {
        return [
            'user' => ['required', 'uuid', 'exists:users,uuid'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'regex:^(+)([0-9]{10,15})'],
            'balance' => ['nullable'],
        ];
    }
}
