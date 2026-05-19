<?php

namespace Modules\Menu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Menu\Database\Factories\TypeMenuFactory;

class TypeMenu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
    'label'
];

    // protected static function newFactory(): TypeMenuFactory
    // {
    //     // return TypeMenuFactory::new();
    // }
}
