<?php

declare (strict_types = 1);

namespace App\Http\Controllers\Api\V1\Vendor;

use Domains\Vendor\Actions\Vendor\CreateVendor;
use Domains\Shared\Factories\ProfessionFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Vendor\StoreVendorRequest;
use JustSteveKing\StatusCode\Http;
use Illuminate\Http\JsonResponse;
use Infrastructure\ApiResponse;

class StoreController extends Controller
{
    use ApiResponse;

    public function __invoke(StoreVendorRequest $request): JsonResponse
    {
        $vendorVo = ProfessionFactory::make($request->validated());

        CreateVendor::handle(
            vendorVO: $vendorVo
        );

        return $this->handle_success(
            data: null,
            code: Http::ACCEPTED->value
        );
    }
}
