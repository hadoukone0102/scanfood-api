<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Perm extends Model
{
    use HasFactory, HasUuids;

    protected $table = "perms";
    protected $fillable = ["code", "desc"];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            Types_user::class,
            'roles_perms',   // table pivot
            'perm_id',       // FK vers perms
            'role_id'        // FK vers types_users
        );
    }
}