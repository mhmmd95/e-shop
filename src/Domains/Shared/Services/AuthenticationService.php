<?php

declare(strict_types=1);

namespace Domains\Shared\Services;

use Domains\Shared\Exceptions\AuthenticationPasswordException;
use Domains\Shared\Actions\Auth\CheckUserCredentials;
use Infrastructure\ApiResponse;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;

final class AuthenticationService
{
    use ApiResponse;

    public function handleUserLogin($validatedData): JsonResponse
    {
        try {
            $result = CheckUserCredentials::handle($validatedData);
        } catch (AuthenticationPasswordException $e) {

            return $this->handle_error(
                errors: null,
                message: $e->getMessage(),
                code: Http::UNAUTHORIZED->value,
            );
        }

        return $this->handle_success(
            data: $result,
            message: 'sucessfully done..',
        );
    }
}
