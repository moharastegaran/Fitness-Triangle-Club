<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkoutCategory extends Model
{
    public $timestamps = false;

    protected $table = 'workout_category';

    protected $fillable = ['name'];

    public function workouts()
    {
        return $this->hasMany(Workout::class, 'category_id');
    }
}
