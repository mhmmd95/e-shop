<?php

declare (strict_types = 1);

namespace Domains\Customer\Actions\Customer;

use Domains\Customer\ValueObjects\CustomerValueObject;
use Domains\Customer\Models\Profession as ModelsProfession;
use Domains\Customer\Enums\Profession;
use Domains\Customer\Models\Customer;
use Domains\Customer\Models\User;
use Infrastructure\ApiResponse;

class CreateCustomer {

    use ApiResponse;

    public static function handle(CustomerValueObject $customerVO): void
    {
        $user = User::whereUuid($customerVO->user)->first();

        if(!is_null($user->profession_id))
            return;

        $profession = ModelsProfession::firstOrCreate(
            [ 'title' => Profession::CUSTOMER->value ],
            [ 'description' =>  Profession::CUSTOMER->description() ],
        );

        $user->update(['profession_id' => $profession->id]);

        Customer::firstOrCreate(
            [ 'user_id' => $user->id ],
            $customerVO->toArray()
        );
    }
}
