<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkoutProgram extends Model
{
    use SoftDeletes;

    protected $table = 'workout_program';

    protected $fillable = [
        'coach_id',
        'request_id',
        'requester_id',
        'requester_name',
        'duration',
        'from',
        'comment',
        'day_type'
    ];

    public function items()
    {
        return $this->hasMany(WorkoutProgramItem::class, 'program_id');
    }

    public function request()
    {
        return $this->belongsTo(UserRequest::class, 'request_id');
    }

    public function getRequesterName()
    {
//        if ($this->request) {
//            return $this->request->user->name . ' ' . $this->request->user->family;
//        }
        return $this->requester_name;
    }

    public function user(){
        return $this->belongsTo(User::class,'requester_id');
    }
}
