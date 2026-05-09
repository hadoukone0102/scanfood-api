<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types_user extends Model
{
    /** @use HasFactory<\Database\Factories\TypesUserFactory> */
    use HasFactory;

    protected $fillable = ["labelle","description"];
    protected $tableName = "types_users";
}
