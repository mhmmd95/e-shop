<?php

declare (strict_types = 1);

namespace Domains\Shared\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domains\Shared\Models\Concerns\HasUuid;
use Database\Factories\ProfessionFactory;
use Illuminate\Database\Eloquent\Model;

final class Profession extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'uuid',
        'title',
        'description',
        'class',
    ];

    protected $hidden = [
        'id',
        'class',
    ];

    protected static function newFactory()
    {
        return ProfessionFactory::new();
    }
}
