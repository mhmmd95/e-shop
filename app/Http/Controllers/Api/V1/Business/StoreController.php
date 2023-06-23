<?php

declare (strict_types = 1);

namespace App\Http\Controllers\Api\V1\Business;

use App\Http\Requests\Api\V1\Business\StoreBusinessRequest;
use Domains\Vendor\ValueObjects\BusinessValueObject;
use Domains\Vendor\Services\VendorService;
use App\Http\Controllers\Controller;
use Domains\Vendor\Models\Vendor;
use JustSteveKing\StatusCode\Http;
use Illuminate\Http\JsonResponse;
use Infrastructure\ApiResponse;

final class StoreController extends Controller
{
    use ApiResponse;

    public function __construct(
        private VendorService $service,
    ){}

    public function __invoke(StoreBusinessRequest $request, Vendor $vendor): JsonResponse
    {
        $this->service->createBusiness(
            vendor: $vendor,
            object: new BusinessValueObject(...$request->validated())
        );

        return $this->handle_success(
            data: null,
            code: Http::ACCEPTED->value
        );
    }
}
