<?php

declare (strict_types = 1);

namespace Domains\Vendor\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domains\Shared\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'uuid',
        'name',
        'description',
        'vendor_id',
    ];

    protected $hidden = [
        'id'
    ];
}
