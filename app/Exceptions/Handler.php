<?php

declare (strict_types = 1);

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Infrastructure\ApiResponse;
use JustSteveKing\StatusCode\Http;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

final class Handler extends ExceptionHandler
{
    use ApiResponse;

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        // Check for a specific request header
        $checkAppJSONHeader = $request->header('Accept');

        if ($checkAppJSONHeader === 'application/json') {
            // Override the exception handling behavior based on the header value

            if( $e instanceof ModelNotFoundException)
                return $this->handle_error(null, 'Can\'t find your record!');

            if( $e instanceof NotFoundHttpException)
                return $this->handle_error(null, 'Wrong url, not found');

            if( $e instanceof AuthenticationException)
                return $this->handle_error(null, $e->getMessage(), Http::UNAUTHORIZED->value);
        }

        // Default exception rendering behavior
        return parent::render($request, $e);
    }
}
