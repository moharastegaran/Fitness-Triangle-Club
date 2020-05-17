<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NutritionProgramItem extends Model
{

    public $timestamps = false;

    protected $table = 'nutrition_program_item';

    protected $fillable = [
        'program_id',
        'nutrition_id',
        'day',
        'meal_id',
        'gram',
        'calorie'
    ];

    public function program()
    {
        return $this->belongsTo(NutritionProgram::class,'program_id');
    }

    public function meal()
    {
        return $this->belongsTo(Meal::class,'meal_id');
    }

    public function nutrition()
    {
        return $this->belongsTo(Nutrition::class,'nutrition_id');
    }

}
