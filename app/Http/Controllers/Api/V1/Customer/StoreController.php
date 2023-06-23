<?php

declare (strict_types = 1);

namespace App\Http\Controllers\Api\V1\Customer;

use App\Http\Requests\Api\V1\Customer\StoreCustomerRequest;
use Domains\Customer\Actions\Customer\CreateCustomer;
use Domains\Shared\Factories\ProfessionFactory;
use App\Http\Controllers\Controller;
use JustSteveKing\StatusCode\Http;
use Illuminate\Http\JsonResponse;
use Infrastructure\ApiResponse;

class StoreController extends Controller
{
    use ApiResponse;

    public function __invoke(StoreCustomerRequest $request): JsonResponse
    {
        $customerVo = ProfessionFactory::make($request->validated());

        CreateCustomer::handle(
            customerVo: $customerVo
        );

        return $this->handle_success(
            data: null,
            code: Http::ACCEPTED->value
        );

    }
}
