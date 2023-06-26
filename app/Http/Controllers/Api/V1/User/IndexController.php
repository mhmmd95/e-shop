<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\User;

use Domains\Shared\Resources\UserResource;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Controllers\Controller;
use Domains\Shared\Models\User;
use Illuminate\Http\JsonResponse;
use Infrastructure\ApiResponse;

class IndexController extends Controller
{
    use ApiResponse;

    public function __invoke(): JsonResponse
    {
        $users = QueryBuilder::for(
            subject: User::class,
        )->allowedIncludes(
            includes: ['profession', 'vendor.businesses.categories'],
        )->allowedFilters(
            filters: ['username'],
        )
        ->paginate();


        return $this->handle_success(
            data: UserResource::collection($users),
        );
    }
}
