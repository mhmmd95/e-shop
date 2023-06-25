<?php

declare (strict_types = 1);

namespace App\Http\Controllers\Api\V1\Vendor;

use Domains\Vendor\Actions\Vendor\CreateVendor;
use Domains\Shared\Factories\ProfessionFactory;
use App\Http\Controllers\Controller;
use Domains\Vendor\Actions\Vendor\DestroyVendor;
use Domains\Vendor\Models\Vendor;
use JustSteveKing\StatusCode\Http;
use Illuminate\Http\JsonResponse;
use Infrastructure\ApiResponse;

final class DestroyController extends Controller
{
    use ApiResponse;

    public function __invoke(Vendor $vendor): JsonResponse
    {
        DestroyVendor::handle(
            vendor: $vendor
        );

        return $this->handle_success(
            data: null,
            code: Http::ACCEPTED->value
        );
    }
}
