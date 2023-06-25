<?php

declare (strict_types = 1);

namespace Domains\Vendor\Actions\Vendor;

use Domains\Shared\Models\Profession as ModelsProfession;
use Domains\Shared\ValueObjects\ProfessionValueObject;
use Domains\Shared\Enums\Profession;
use Domains\Shared\Exceptions\UserAlreadyHasProfessionException;
use Illuminate\Support\Facades\DB;
use Domains\Vendor\Models\Vendor;
use Domains\Shared\Models\User;
use Infrastructure\ApiResponse;

class CreateVendor {

    use ApiResponse;

    public static function handle(ProfessionValueObject $vendorVO): void
    {
        $user = User::whereUuid($vendorVO->user)->first();

        if(!is_null($user->profession_id))
            throw new UserAlreadyHasProfessionException('user already has a profession!!');

        DB::transaction(function() use ($vendorVO, $user) {

            $profession = ModelsProfession::firstOrCreate(
                [   'title' => Profession::VENDOR->value    ],
                [
                    'description' =>  Profession::VENDOR->description(),
                    'class' => Profession::VENDOR->class(),
                ],
            );

            $user->update(['profession_id' => $profession->id]);

            Vendor::firstOrCreate(
                [ 'user_id' => $user->id ],
                $vendorVO->toArray()
            );
        });

    }
}
