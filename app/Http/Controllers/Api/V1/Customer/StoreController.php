<?php

declare (strict_types = 1);

namespace App\Http\Controllers\Api\V1\Customer;

use App\Http\Requests\Api\V1\Customer\StoreCustomerRequest;
use Domains\Customer\Actions\Customer\CreateCustomer;
use Domains\Customer\Factories\CustomerFactory;
use App\Http\Controllers\Controller;
use JustSteveKing\StatusCode\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Infrastructure\ApiResponse;

class StoreController extends Controller
{
    use ApiResponse;

    public function __invoke(StoreCustomerRequest $request): JsonResponse
    {
        $customerVo = CustomerFactory::make($request->validated());

        return DB::transaction(function() use ($customerVo) {

            CreateCustomer::handle(
                customerVO: $customerVo
            );

            return $this->handle_success(
                data: null,
                code: Http::ACCEPTED->value
            );

        });
    }
}
