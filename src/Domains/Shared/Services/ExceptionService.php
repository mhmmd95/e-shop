<?php

declare(strict_types = 1);

namespace Domains\Shared\Services;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Domains\Shared\Exceptions\UserAlreadyHasProfessionException;
use Domains\Shared\Exceptions\UserHasNoProfessionException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\QueryBuilder\Exceptions\InvalidIncludeQuery;
use Spatie\QueryBuilder\Exceptions\InvalidFilterQuery;
use Illuminate\Auth\AuthenticationException;
use JustSteveKing\StatusCode\Http;
use Illuminate\Http\JsonResponse;
use Infrastructure\ApiResponse;
use Exception;
use Throwable;

final class ExceptionService {

    use ApiResponse;

    public function handleJsonResponseExceptions(Throwable $exception): JsonResponse
    {
        // Override the exception handling behavior based on the header value
        if ($exception instanceof ModelNotFoundException)
            return $this->handle_error(null, 'Can\'t find your record!');

        if ($exception instanceof NotFoundHttpException)
            return $this->handle_error(null, 'Wrong url, not found');

        if ($exception instanceof AuthenticationException)
            return $this->handle_error(null, $exception->getMessage(), Http::UNAUTHORIZED->value);

        if ($exception instanceof InvalidFilterQuery)
            return $this->handle_error(null, $exception->getMessage());

        if ($exception instanceof InvalidIncludeQuery)
            return $this->handle_error(null, $exception->getMessage());

        if ($exception instanceof UserAlreadyHasProfessionException)
            return $this->handle_error(null, $exception->getMessage());

        if ($exception instanceof UserHasNoProfessionException)
            return $this->handle_error(null, $exception->getMessage());

        if ($exception instanceof Exception)
            return $this->handle_error(null, $exception->getMessage());
    }
}
