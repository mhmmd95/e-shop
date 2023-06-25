<?php

declare (strict_types = 1);

namespace Domains\Vendor\Models;

use Domains\Shared\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'uuid',
        'name',
        'description',
        'business_id',
    ];

    protected $hidden = [
        'id'
    ];

    // public function products(): HasMany
    // {
    //     return $this->hasMany(Product::class);
    // }
}
