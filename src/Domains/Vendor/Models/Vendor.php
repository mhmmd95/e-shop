<?php

declare (strict_types = 1);

namespace Domains\Vendor\Models;

use Database\Factories\VendorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domains\Shared\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vendor extends Model
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

    public function businesses(): HasMany
    {
        return $this->hasMany(Business::class);
    }

    protected static function newFactory(): VendorFactory
    {
        return VendorFactory::new();
    }
}
