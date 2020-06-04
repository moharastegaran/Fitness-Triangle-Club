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
}
