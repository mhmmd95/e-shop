<?php

declare(strict_types=1);

namespace Domains\Shared\Actions\Auth;

use Domains\Shared\Exceptions\AuthenticationPasswordException;
use Domains\Shared\Models\User;
use Illuminate\Support\Facades\Hash;
use Infrastructure\ApiResponse;

class CheckUserCredentials
{
    use ApiResponse;

    /**
     * login to a user account
     * @return string $result
     */
    public static function handle(array $validatedData): string
    {
        $user = User::where('email', $validatedData['email'])->firstOrFail();

        if (!Hash::check($validatedData['password'], $user->password))
            throw new AuthenticationPasswordException('authentication failed, incorrect password!');

        return $user->createToken('auth_token')->plainTextToken;
    }
}
