<?php

declare (strict_types = 1);

namespace App\Http\Requests\Api\V1\Auth;

use Domains\Shared\Requests\Concerns\OverrideFailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
    use OverrideFailedValidation;

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string', 'min:8']
        ];
    }
}
