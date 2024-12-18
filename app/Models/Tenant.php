<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Domain;
use Stancl\Tenancy\Database\Models\Tenant as ModelsTenant;

class Tenant extends ModelsTenant implements TenantWithDatabase
{
    use HasDatabase;
    use HasDomains;

    public function domains(): HasMany
    {
        return $this->hasMany(Domain::class);
    }

    public static function getCustomColumns(): array
    {
        return [
            'id',
            'name',
            'email',
            'password',
        ];
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = Hash::make($value);
    }
}
