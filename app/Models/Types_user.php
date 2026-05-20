<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Types_user extends Model
{
    use HasFactory, HasUuids;

    protected $table = "types_users"; 
    protected $fillable = ["labelle", "description"];

    public function perms(): BelongsToMany
    {
        return $this->belongsToMany(
            Perm::class,
            'roles_perms',   // table pivot
            'role_id',       // FK vers types_users
            'perm_id'        // FK vers perms
        );
    }
}