<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Business;

use Domains\Vendor\Models\Business;
use Domains\Vendor\Resources\BusinessResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Controller;
use Domains\Vendor\Models\Vendor;
use Infrastructure\ApiResponse;
use Spatie\QueryBuilder\QueryBuilder;

class ShowController extends Controller
{
    use ApiResponse;

    public function __invoke(Vendor $vendor, Business $business): JsonResponse
    {
        $business = QueryBuilder::for(
            subject: Business::class,
        )->where([
            'uuid' => $business->uuid,
            'vendor_id' => $vendor->id,
        ])->firstOrFail();

        return $this->handle_success(new BusinessResource($business));
    }
}
