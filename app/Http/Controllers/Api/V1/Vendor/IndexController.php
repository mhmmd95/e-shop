<?php

declare (strict_types = 1);

namespace App\Http\Controllers\Api\V1\Vendor;

use Domains\Vendor\Resources\VendorResource;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Controllers\Controller;
use Domains\Vendor\Models\Vendor;
use Illuminate\Http\JsonResponse;
use Infrastructure\ApiResponse;

class IndexController extends Controller
{
    use ApiResponse;

    public function __invoke(): JsonResponse
    {
        $vendors = QueryBuilder::for(
            subject: Vendor::class,
        )->allowedIncludes(
            includes: ['businesses'],
        )->allowedFilters(
            filters: ['name', 'phone'],
        )->paginate();

        return $this->handle_success(
            data: VendorResource::collection($vendors),
        );
    }
}
