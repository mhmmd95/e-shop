<?php

declare (strict_types = 1);

namespace App\Http\Controllers\Api\V1\Category;

use App\Http\Requests\Api\V1\Category\StoreCategoryRequest;
use Domains\Vendor\ValueObjects\CategoryValueObject;
use Domains\Vendor\Actions\Category\CreateCategory;
use App\Http\Controllers\Controller;
use JustSteveKing\StatusCode\Http;
use Infrastructure\ApiResponse;

final class StoreController extends Controller
{
    use ApiResponse;

    public function __invoke(StoreCategoryRequest $request)
    {
        CreateCategory::handle(
            categoryVO: new CategoryValueObject(...$request->validated()),
        );

        return $this->handle_success(
            data: null,
            code: Http::ACCEPTED->value
        );
    }
}
