<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    protected $fillable=[
        'user_id',
        'is_approved',
        'is_workout_program',
        'is_nutrition_program',
        'comment',
        'days'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function workout_program(){
        return $this->hasOne(WorkoutProgram::class,'request_id');
    }

    public function nutrition_program(){
        return $this->hasOne(NutritionProgram::class,'request_id');
    }

    public function transaction(){
        return $this->hasOne(Transaction::class,'request_id');
    }
}
