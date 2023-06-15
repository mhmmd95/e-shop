<?php

declare(strict_types=1);

namespace Domains\Customer\Actions;

use App\Exceptions\AuthenticationPasswordException;
use Domains\Customer\Models\User;
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
