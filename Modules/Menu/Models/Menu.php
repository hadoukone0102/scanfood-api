<?php

namespace Modules\Menu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Menu\Models\Repas;
use Modules\Menu\Models\TypeMenu;

// use Modules\Menu\Database\Factories\MenuFactory;

class Menu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
    'name',
    'description',
    'type_menu_id',
    'account_id',
    'price',
    'photo',
    'photo_public_id',
    'status',
    'preparation_time'
];


 public function typeMenu()
    {
        return $this->belongsTo(TypeMenu::class);
    }

public function repas()
{
    return $this->belongsToMany(
        Repas::class,
        'menu_repas'
    );
}
    // protected static function newFactory(): MenuFactory
    // {
    //     // return MenuFactory::new();
    // }
}
