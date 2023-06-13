<?php

declare (strict_types = 1);

namespace Domains\Customer\Models;

use Database\Factories\ProfessionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'title',
        'description',
    ];

    protected $hidden = [
        'id',
    ];

    protected static function newFactory()
    {
        return ProfessionFactory::new();
    }
}
