<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkoutProgramItem extends Model
{
    protected $table = 'workout_program_item';

    public $timestamps=false;

    protected $fillable = [
        'program_id',
        'workout_ids',
        'day',
        'set',
        'repeat',
        'rhythm',
        'gap',
        'comment',
    ];

    public function program()
    {
        return $this->belongsTo(WorkoutProgram::class, 'program_id');
    }

    public function workouts(){
        $ids = json_decode($this->workout_ids);
        $titles='';
        for ($i=0;$i<count($ids);$i++){
            $titles.=Workout::find(intval($ids[$i]))->title;
            if (count($ids) - $i > 1){
                $titles.=', ';
            }
        }
        return $titles;
    }

    public function repeats(){
        $repeats = json_decode($this->repeat);
        $titles='';
        for ($i=0;$i<count($repeats);$i++){
            $titles.=$repeats[$i];
            if (count($repeats) - $i > 1){
                $titles.=', ';
            }
        }
        return $titles;
    }
}
