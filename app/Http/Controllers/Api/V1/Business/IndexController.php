<?php

declare (strict_types = 1);

namespace App\Http\Controllers\Api\V1\Business;

use App\Http\Controllers\Controller;
use Domains\Vendor\Models\Business;
use Domains\Vendor\Models\Vendor;
use Domains\Vendor\Resources\BusinessResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Infrastructure\ApiResponse;
use Spatie\QueryBuilder\QueryBuilder;

class IndexController extends Controller
{
    use ApiResponse;

    public function __invoke(Vendor $vendor): JsonResponse
    {
        $businesses = QueryBuilder::for(
            subject: Business::class,
        )->allowedFilters(
            filters: ['name'],
        )->where('vendor_id', $vendor->id)
        ->paginate();

        return $this->handle_success(
            data: BusinessResource::collection($businesses),
        );
    }
}
