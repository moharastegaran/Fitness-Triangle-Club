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
        'comment'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function workout_programs(){
        return $this->hasMany(WorkoutProgram::class,'request_id');
    }

    public function nutrition_programs(){
        return $this->hasMany(NutritionProgram::class,'request_id');
    }

    public function transaction(){
        return $this->hasOne(Transaction::class,'request_id');
    }
}
