<?php

declare (strict_types = 1);

namespace Infrastructure;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\MessageBag;
use JustSteveKing\StatusCode\Http;
use Illuminate\Http\Resources\Json\JsonResource;

trait ApiResponse {

    private function handle_success(array|string|JsonResource|null $data, string $message = 'sucess', int $code = Http::OK->value): JsonResponse {

        return response()->json([
            'result' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    private function handle_error(MessageBag|null $errors, string $message = 'error', int $code = Http::BAD_REQUEST->value): JsonResponse {

        return response()->json([
            'result' => false,
            'message' => $message,
            'errors' => $errors,
        ], $code);
    }
}
