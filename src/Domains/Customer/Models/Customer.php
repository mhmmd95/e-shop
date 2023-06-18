<?php

declare (strict_types = 1);

namespace Domains\Customer\Models;

use Domains\Shared\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

final class Customer extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'uuid',
        'name',
        'phone',
        'balance',
        'user_id',
    ];

    protected $attributes = [
        'balance' => 0.00,
    ];

    protected $hidden = [
        'id'
    ];
}
