<?php

namespace Modules\Menu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Menu\Database\Factories\MenuRepasFactory;

class MenuRepas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): MenuRepasFactory
    // {
    //     // return MenuRepasFactory::new();
    // }
}
