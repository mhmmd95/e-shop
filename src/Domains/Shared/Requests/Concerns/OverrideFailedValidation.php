<?php

declare (strict_types = 1);

namespace Domains\Shared\Requests\Concerns;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Infrastructure\ApiResponse;

trait OverrideFailedValidation {

    use ApiResponse;

    protected function failedValidation(Validator $validator)
    {
        if (!$this->expectsJson())
            parent::failedValidation($validator);

        throw new HttpResponseException(
            $this->handle_error(
                errors: $validator->errors(),
                message: config('auth.validations.errors.message'),
            )
        );
    }

}
