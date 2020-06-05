<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramRequest;
use App\User;
use App\UserRequest;
use App\Workout;
use App\WorkoutCategory;
use App\Permission;
use App\WorkoutProgram;
use App\WorkoutProgramItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Morilog\Jalali\CalendarUtils;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;

class WorkoutProgramController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny',WorkoutProgram::class);

        $workoutPrograms = WorkoutProgram::query()->latest()->get();
        return view('panel.workout_programs.index', compact('workoutPrograms'));
    }

    public function create()
    {
        $this->authorize('create',WorkoutProgram::class);

        $categories = WorkoutCategory::orderBy('title')->get();
        $members = User::members();
        return view('panel.workout_programs.create', compact('categories','members'));
    }

    public function store(ProgramRequest $request)
    {
        $this->authorize('create',WorkoutProgram::class);

        $data = $request->all();
        $data['coach_id']=auth()->user()->id;
        $data['day_type']= ($data['day_type']=='false' ? 0 : 1);
        $data['from'] = CalendarUtils::createCarbonFromFormat('Y-m-d', $data['from'])->toDateString();
        if(array_key_exists('request_id',$data)){
            $data['request_id']=intval($data['request_id']);
            $req = UserRequest::find($data['request_id']);
            $req->is_approved = 1;
            $req->save();
        }
        $program = WorkoutProgram::create($data);
        if ($request->has('items')){
            foreach ($data['items'] as $key => $day){
                foreach ($day as $item){
                    if (array_key_exists('workout_ids',$item)){
                        $item['program_id'] = $program->id;
                        $item['day'] = $this->getDay($key,$program->day_type);
                        $item['workout_ids'] = json_encode($item['workout_ids']);
                        WorkoutProgramItem::create($item);
                    }
                }
            }
        }
        return redirect()->route('panel.admin.workout-programs.index');
    }

    private function getDay($index,$switch){
        switch ($index){
            case 1 : return $switch ? "شنبه" : "روز اول";
            case 2 : return $switch ? "یکشنبه" : "روز دوم";
            case 3 : return $switch ? "دوشنبه" : "روز سوم";
            case 4 : return $switch ? "سه‌شنبه" : "روز چهارم";
            case 5 : return $switch ? "چهارشنبه" : "روز پنجم";
            case 6 : return $switch ? "پنج‌شنبه" : "روز ششم";
            case 7 : return $switch ? "جمعه" : "روز هفتم";
            default : return "";
        }
    }

    public function show($id)
    {
        $program = WorkoutProgram::find($id);
        $this->authorize('view',$program);

        $workouts = Workout::all();
        return view('panel.workout_programs.show',compact('program','workouts'));
    }

    public function edit($id)
    {
        $program = WorkoutProgram::find($id);
        $this->authorize('update',$program);

        $categories = WorkoutCategory::orderBy('title')->get();
        $members = User::members();
        return view('panel.workout_programs.edit',compact('program','categories','members'));
    }

    public function update(ProgramRequest $request, $id)
    {
        $program = WorkoutProgram::find($id);
        $this->authorize('update',$program);

        $data = $request->all();
        $data['coach_id']=auth()->user()->id;
        $data['day_type']= ($data['day_type']=='false' ? 0 : 1);
        $data['from'] = CalendarUtils::createCarbonFromFormat('Y-m-d', $data['from'])->toDateString();
        $program->update($data);
        $program->items()->delete();
        if ($request->has('items')){
            foreach ($data['items'] as $key => $day){
                foreach ($day as $item) {
                    if (array_key_exists('workout_ids', $item)) {
                        $item['program_id'] = $program->id;
                        $item['day'] = $this->getDay($key,$program->day_type);
                        $item['workout_ids'] = json_encode($item['workout_ids']);
                        WorkoutProgramItem::create($item);
                    }
                }
            }
        }
        return redirect()->route('panel.admin.workout-programs.index');
    }

    public function destroy($id)
    {
        $program = WorkoutProgram::find($id);
        $this->authorize('delete',$program);

        $program->delete();
        return redirect()->back()->with([
            'is_deleted' => true
        ]);
    }

    public function updateItem(Request $request,$id){
        return $request->all();
    }

    public function exportPDF($id)
    {
        $program = WorkoutProgram::find($id);
        $this->authorize('view',$program);

        return PDF::loadView('panel.workout_programs.pdf_en', compact('program'), [], [
            'format' => 'A5-L','mode' => 'utf-8'
        ])->stream('برنامه تمرینی_'.$program->requester_name.'.pdf');
    }
}
