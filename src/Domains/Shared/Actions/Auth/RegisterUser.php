<?php

declare (strict_types = 1 );

namespace Domains\Shared\Actions\Auth;

use Domains\Shared\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterUser {

    /**
     * create a user instance
     * @return string $token
     */
    public static function handle(array $validatedData): string  {

        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);

        return $user->createToken('auth_token')->plainTextToken;
    }
}
