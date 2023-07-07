<?php

declare (strict_types = 1);

namespace Domains\Vendor\Models;

use Database\Factories\BusinessFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domains\Shared\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    protected static function newFactory(): BusinessFactory
    {
        return BusinessFactory::new();
    }
}
