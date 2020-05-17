<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramRequest;
use App\Workout;
use App\WorkoutCategory;
use App\Permission;
use App\WorkoutProgram;
use App\WorkoutProgramItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Morilog\Jalali\CalendarUtils;

class WorkoutProgramController extends Controller
{
    public function index()
    {
        $workoutPrograms = WorkoutProgram::query()->latest()->get();

        return view('panel.workout_programs.index', compact('workoutPrograms'));
    }

    public function create()
    {
        $request_id = request('request_id');
        $request = null;
        if($request_id) {

        }
        $categories = WorkoutCategory::orderBy('title')->get();
        return view('panel.workout_programs.create', compact('categories', 'request'));
    }

    public function store(ProgramRequest $request)
    {
        $data = $request->all();
        $data['coach_id']=auth()->user()->id;
        $data['from'] = CalendarUtils::createCarbonFromFormat('Y-m-d', $data['from'])->toDateString();
        $program = WorkoutProgram::create($data);
        if ($request->has('items')){
            foreach ($data['items'] as $key => $day){
                foreach ($day as $item){
                    if (array_key_exists('workout_ids',$item)){
                        $item['program_id'] = $program->id;
                        $item['day'] = $this->getDay($key);
                        $item['workout_ids'] = json_encode($item['workout_ids']);
                        $item['repeat'] = json_encode($item['repeat']);
                        WorkoutProgramItem::create($item);
                    }
                }
            }
        }
        return redirect()->route('panel.admin.workout-programs.index');
    }

    private function getDay($index){
        switch ($index){
            case 1 : return "شنبه";
            case 2 : return "یکشنبه";
            case 3 : return "دوشنبه";
            case 4 : return "سه‌شنبه";
            case 5 : return "چهارشنبه";
            case 6 : return "پنج‌شنبه";
            case 7 : return "جمعه";
            default : return "";
        }
    }

    public function show($id)
    {
        abort_unless(Gate::allows(Permission::WORKOUT_ACCESS), 403);

        $program = WorkoutProgram::find($id);
        $workouts = Workout::all();
        return view('panel.workout_programs.show',compact('program','workouts'));
    }

    public function edit($id)
    {
        abort_unless(Gate::allows(Permission::WORKOUT_EDIT), 403);

        $program = WorkoutProgram::find($id);
        $categories = WorkoutCategory::orderBy('title')->get();
        return view('panel.workout_programs.edit',compact('program','categories'));
    }

    public function update(ProgramRequest $request, $id)
    {
        abort_unless(Gate::allows(Permission::WORKOUT_EDIT), 403);

        $data = $request->all();
        $data['coach_id']=auth()->user()->id;
        $data['from'] = CalendarUtils::createCarbonFromFormat('Y-m-d', $data['from'])->toDateString();
        $program = WorkoutProgram::find($id);
        $program->update($data);
        $program->items()->delete();
        if ($request->has('items')){
            foreach ($data['items'] as $key => $day){
                foreach ($day as $item) {
                    if (array_key_exists('workout_ids', $item)) {
                        $item['program_id'] = $program->id;
                        $item['day'] = $this->getDay($key);
                        $item['workout_ids'] = json_encode($item['workout_ids']);
                        $item['repeat'] = json_encode($item['repeat']);
                        WorkoutProgramItem::create($item);
                    }
                }
            }
        }
        return redirect()->route('panel.admin.workout-programs.index');
    }

    public function destroy($id)
    {
        abort_unless(Gate::allows(Permission::CATEGORY_DELETE), 403);

        $program = WorkoutProgram::find($id);
        $program->delete();

        return redirect()->back()->with([
            'is_deleted' => true
        ]);
    }

    public function updateItem(Request $request,$id){
        return $request->all();
    }
}
