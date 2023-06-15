<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Auth;

use Infrastructure\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Domains\Shared\Requests\Concerns\OverrideFailedValidation;

class RegisterUserRequest extends FormRequest
{
    use ApiResponse, OverrideFailedValidation;

    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
