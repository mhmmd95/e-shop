<?php

declare (strict_types = 1);

namespace App\Http\Controllers\Api\V1\Profession;

use App\Http\Controllers\Controller;
use Domains\Shared\Actions\Profession\DestroyProfession;
use Domains\Shared\Models\User;
use JustSteveKing\StatusCode\Http;
use Illuminate\Http\JsonResponse;
use Infrastructure\ApiResponse;

class DestroyController extends Controller
{
    use ApiResponse;

    public function __invoke(User $user): JsonResponse
    {
        DestroyProfession::handle(user: $user);

        return $this->handle_success(
            data: null,
            code: Http::ACCEPTED->value
        );

    }
}
