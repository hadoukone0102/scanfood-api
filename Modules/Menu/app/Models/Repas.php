<?php

namespace Modules\Menu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Menu\Models\Menu;
// use Modules\Menu\Database\Factories\RepasFactory;

class Repas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
protected $fillable = [
    'name',
    'description'
];


public function menus()
{
    return $this->belongsToMany(
        Menu::class,
        'menu_repas'
    );
}

    // protected static function newFactory(): RepasFactory
    // {
    //     // return RepasFactory::new();
    // }
}
