<?php

declare(strict_types=1);

namespace App\Exceptions;

use Domains\Shared\Actions\Exception\JsonResponseExceptions;
use Domains\Shared\Services\ExceptionService;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

final class Handler extends ExceptionHandler
{

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

        if ($checkAppJSONHeader === 'application/json')
            return resolve(ExceptionService::class)->handleJsonResponseExceptions(exception: $e);

        // Default exception rendering behavior
        return parent::render($request, $e);
    }
}
