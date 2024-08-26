<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // protected $table = 'rooms';
    use HasFactory;
    protected $fillable = ['roomtype','description','image','bedType','capacity','ac','wifi','teaCoffeeMaker','inRoomSafe','purifiedWater','workplace','tv','rainShower','wardrobe','miniBar','livingSpace','fruit','refrigerator','bathtub','hairDryer','iron'];
}
