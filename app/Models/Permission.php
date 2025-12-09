<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory;
    protected function idEncrypted(): Attribute
    {
        return Attribute::get(fn() => Crypt::encrypt($this->id));
    }

    public function detail(): HasOne
    {
        return $this->hasOne(PermissionDetail::class);
    }
}
