<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\RegisterUserRequest;
use App\Http\Requests\Api\V1\Auth\LoginUserRequest;
use Domains\Shared\Actions\Auth\RegisterUser;
use Domains\Shared\Resources\UserResource;
use Domains\Shared\Services\AuthenticationService;
use Illuminate\Http\JsonResponse;
use Infrastructure\ApiResponse;
use JustSteveKing\StatusCode\Http;

final class AuthController extends Controller
{
    use ApiResponse;

    public function __construct(
        public AuthenticationService $service,
    ){}

    public function register(RegisterUserRequest $request): JsonResponse
    {
        $token = RegisterUser::handle(validatedData: $request->validated());
        return $this->handle_success(data: $token);
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        return $this->service->handleUserLogin($request->validated());
    }

    public function me(): JsonResponse
    {
        return $this->handle_success(['user' => new UserResource(auth()->user())]);
    }

    public function logout(): JsonResponse
    {
        auth('sanctum')->user()->currentAccessToken()->delete();
        return $this->handle_success(data: null, code: Http::ACCEPTED->value);
    }

    public function logoutAll(): JsonResponse
    {
        auth('sanctum')->user()->tokens()->delete();
        return $this->handle_success(data: null, code: Http::ACCEPTED->value);
    }
}
