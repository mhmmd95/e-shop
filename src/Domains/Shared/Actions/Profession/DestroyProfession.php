<?php

declare (strict_types = 1 );

namespace Domains\Shared\Actions\Profession;

use Domains\Shared\Exceptions\UserHasNoProfessionException;
use Domains\Shared\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

final class DestroyProfession {

    public static function handle(User $user): void  {

        $profession = $user->profession;

        if(is_null($profession))
            throw new UserHasNoProfessionException('selected user has no profession!');

        DB::transaction(function() use ($profession, $user){
            $profession->class::where('user_id', $user->id)->delete();
            $user->update(['profession_id' => null]);
        });

    }
}
