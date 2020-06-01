<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\WorkoutCategory;
use App\Http\Requests\WorkoutRequest;
use App\Permission;
use App\Workout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class WorkoutController extends Controller
{

    public function index()
    {
        $categories = WorkoutCategory::all();
        return view('panel.workouts.categories')->with(compact('categories'));
    }

    public function group($id)
    {
        $category = WorkoutCategory::find($id);
        $workouts = $category->workouts;
        return view('panel.workouts.index')->with(compact('workouts', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(\Gate::allows(Permission::WORKOUT_CREATE), 403);

        if (session()->has('validating')) {
            if (session()->get('validating') === true) {
                session()->put('validating', false);
            } else {
                DraftController::remove();
            }
        } else {
            DraftController::remove();
        }
        $cats = WorkoutCategory::all();
        return view('panel.workouts.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  WorkoutRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkoutRequest $request)
    {
        session()->remove('validating');

        $temp = Workout::where('title', 'like', $request->title)->first();
        if($temp)
            return redirect()->back()->with('danger', "قبلا تمرینی با عنوان ". $request->title ." ثبت شده است");

        $w = Workout::create($request->all());
        DraftController::syncWith($w->id);
        return redirect()->back()->with('success', $request->title . " به درستی ثبت شد. ");
}

//    private function correct($data)
//    {
//        $data['repeat'] = array_filter($data['repeat'], function ($value) {
//            return !is_null($value) && $value !== '';
//        });
//        $data['repeat'] = array_values($data['repeat']);
//        $data['repeat'] = count($data['repeat']) ? json_encode($data['repeat']) : null;
//        $data['period'] = array_filter($data['period'], function ($value) {
//            return !is_null($value) && $value !== '';
//        });
//        $data['period'] = array_values($data['period']);
//        $data['period'] = count($data['period']) ? json_encode($data['period']) : null;
//        return $data;
//    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_unless(\Gate::allows(Permission::WORKOUT_SHOW), 403);

        $workout = Workout::find($id);
        return view('panel.workouts.show')->with(compact('workout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(\Gate::allows(Permission::WORKOUT_EDIT), 403);

        if (session()->has('validating')) {
            if (session()->get('validating') === true) {
                session()->put('validating', false);
            } else {
                DraftController::remove();
            }
        } else {
            DraftController::remove();
        }
        $workout = Workout::find($id);
        $cats = WorkoutCategory::all();
        return view('panel.workouts.edit')
            ->with(compact('workout'))
            ->with(compact('cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  WorkoutRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkoutRequest $request, $id)
    {
        session()->remove('validating');
        $w = Workout::find($id);
        $w->update($request->all());
        DraftController::syncWith($w->id);

        return redirect()->route('panel.admin.workouts.index', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_unless(\Gate::allows(Permission::WORKOUT_DELETE), 403);

        $workout = Workout::find($id);
        $workout->delete();

        Attachment::where('attachmentable_id', $id)->where('attachmentable_type', Workout::class)->delete();

        $path = env('WORKOUT_DIR_PATH') . $id;
        Storage::deleteDirectory($path);

        return redirect()->back()->with([
            'is_deleted' => true
        ]);
    }

    public function destroyMultiple(Request $request)
    {
        abort_unless(\Gate::allows(Permission::WORKOUT_DELETE), 403);

        $ids = $request->deletable;
        Workout::destroy($ids);

        foreach ($ids as $id) {
            Attachment::where('workout_id', $id)->delete();

            Storage::deleteDirectory(env('WORKOUT_DIR_PATH') . $id);
        }
        return " ";
    }
}
