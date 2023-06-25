<?php

declare (strict_types = 1);

namespace App\Http\Requests\Api\V1\Category;

use Domains\Shared\Requests\Concerns\OverrideFailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    use OverrideFailedValidation;

    public function rules(): array
    {
        return [
            'business' => ['required', 'uuid', 'exists:businesses,uuid'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
        ];
    }
}
