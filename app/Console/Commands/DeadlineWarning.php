<?php

namespace App\Console\Commands;

use App\NutritionProgram;
use App\User;
use App\WorkoutProgram;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class DeadlineWarning extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deadline:warning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The deadline of programs is less than a week';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $workout_programs = WorkoutProgram::all();
        foreach ($workout_programs as $wp) {
            $expected = Carbon::parse($wp->from)->addDays($wp->duration);
            $diff=$expected->diffInDays(now(),false);
            if($diff < 0 && $diff > -7){
                $diff = abs($diff);
                Notification::send(User::admins(),new \App\Notifications\DeadlineWarning($wp,$diff));
            }
        }

        $nutrition_programs = NutritionProgram::all();
        foreach ($nutrition_programs as $np) {
            $expected = Carbon::parse($np->from)->addDays($np->duration);
            $diff=$expected->diffInDays(now(),false);
            if($diff < 0 && $diff > -7){
                $diff = abs($diff);
                Notification::send(User::admins(),new \App\Notifications\DeadlineWarning($np,$diff));
            }
        }
    }
}
