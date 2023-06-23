<?php

declare (strict_types = 1);

namespace App\Http\Requests\Api\V1\Business;

use Domains\Shared\Requests\Concerns\OverrideFailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class StoreBusinessRequest extends FormRequest
{
    use OverrideFailedValidation;

    public function rules(): array
    {
        return [
            // 'vendor' => ['required', 'uuid', 'exists:vendors,uuid'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
        ];
    }
}
