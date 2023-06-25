<?php

declare(strict_types=1);

namespace Domains\Customer\Actions\Customer;

use Domains\Shared\Models\Profession as ModelsProfession;
use Domains\Shared\ValueObjects\ProfessionValueObject;
use Domains\Shared\Enums\Profession;
use Domains\Customer\Models\Customer;
use Domains\Shared\Exceptions\UserAlreadyHasProfessionException;
use Illuminate\Support\Facades\DB;
use Domains\Shared\Models\User;
use Infrastructure\ApiResponse;

final class CreateCustomer {

    use ApiResponse;

    public static function handle(ProfessionValueObject $customerVo): void {

        $user = User::whereUuid($customerVo->user)->first();

        if (!is_null($user->profession_id))
            throw new UserAlreadyHasProfessionException('user already has a profession!!');

        DB::transaction(function () use ($customerVo, $user) {

            $profession = ModelsProfession::firstOrCreate(
                ['title' => Profession::CUSTOMER->value],
                [
                    'description' =>  Profession::CUSTOMER->description(),
                    'class' =>  Profession::CUSTOMER->class(),
                ],
            );

            $user->update(['profession_id' => $profession->id]);

            Customer::firstOrCreate(
                ['user_id' => $user->id],
                $customerVo->toArray()
            );
        });

    }
}
