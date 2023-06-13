<?php

declare (strict_types = 1);

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid {

    public static function bootHasUuid(): void {
        static::creating(fn(Model $model) => $model->uuid = Str::uuid()->toString());
    }

    public function getRouteKeyName(): string {
        return 'uuid';
    }
}
