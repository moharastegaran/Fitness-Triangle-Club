<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public $timestamps=false;

    public function items()
    {
        return $this->hasMany(NutritionProgramItem::class);
    }
}
