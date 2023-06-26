<?php

declare (strict_types = 1);

namespace Domains\Shared\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Database\Factories\UserFactory;
use Domains\Customer\Models\Customer;
use Illuminate\Notifications\Notifiable;
use Domains\Shared\Models\Concerns\HasUuid;
use Domains\Vendor\Models\Vendor;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

final class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuid;

    protected $fillable = [
        'uuid',
        'username',
        'profession_id',
        'email',
        'password',
    ];

    protected $hidden = [
        'id',
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    //Relations
    public function profession(): BelongsTo
    {
        return $this->BelongsTo(Profession::class);
    }

    public function vendor(): HasOne{

        return $this->hasOne(Vendor::class);
    }

    public function customer(): HasOne{

        return $this->hasOne(Customer::class);
    }
}
