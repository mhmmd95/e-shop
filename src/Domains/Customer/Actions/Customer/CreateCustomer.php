<?php

declare(strict_types=1);

namespace Domains\Customer\Actions\Customer;

use Domains\Shared\Models\Profession as ModelsProfession;
use Domains\Shared\ValueObjects\ProfessionValueObject;
use Domains\Shared\Enums\Profession;
use Domains\Customer\Models\Customer;
use Illuminate\Support\Facades\DB;
use Domains\Shared\Models\User;
use Infrastructure\ApiResponse;

final class CreateCustomer {

    use ApiResponse;

    public static function handle(ProfessionValueObject $customerVo): void {

        $user = User::whereUuid($customerVo->user)->first();

        if (!is_null($user->profession_id))
            return;

        DB::transaction(function () use ($customerVo, $user) {

            $profession = ModelsProfession::firstOrCreate(
                ['title' => Profession::CUSTOMER->value],
                ['description' =>  Profession::CUSTOMER->description()],
            );

            $user->update(['profession_id' => $profession->id]);

            Customer::firstOrCreate(
                ['user_id' => $user->id],
                $customerVo->toArray()
            );
        });

    }
}
