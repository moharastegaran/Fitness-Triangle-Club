<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramRequest;
use App\Meal;
use App\Nutrition;
use App\NutritionProgram;
use App\NutritionProgramItem;
use App\User;
use App\UserRequest;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;

class NutritionProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(auth()->user()->can('viewAny',NutritionProgram::class),403);

        $nutritionPrograms = NutritionProgram::query()->latest()->get();
        return view('panel.nutrition_programs.index', compact('nutritionPrograms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(auth()->user()->can('create',NutritionProgram::class),403);

        $nutritions = Nutrition::all();
        $meals = Meal::all();
        $members = User::members();
        return view('panel.nutrition_programs.create',compact('nutritions','meals','members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProgramRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramRequest $request)
    {
        abort_unless(auth()->user()->can('create',NutritionProgram::class),403);

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
        $program = NutritionProgram::create($data);
        if ($request->has('items')) {
            foreach ($data['items'] as $key => $day) {
                foreach ($day as $item) {
                    $item['program_id'] = $program->id;
                    $item['day'] = $this->getDay($key,$program->day_type);
                    NutritionProgramItem::create($item);
                }
            }
        }
        return redirect()->route('panel.admin.nutrition-programs.index');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = NutritionProgram::find($id);
        abort_unless(auth()->user()->can('view',$program),403);

        $nutritions = Nutrition::get(['id','name']);
        $meals = Meal::all();
        return view('panel.nutrition_programs.show',compact('program','nutritions','meals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = NutritionProgram::find($id);
        abort_unless(auth()->user()->can('update',$program),403);

        $nutritions = Nutrition::all();
        $meals = Meal::all();
        $members = User::members();
        return view('panel..nutrition_programs.edit',compact('program','nutritions','meals','members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProgramRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramRequest $request, $id)
    {
        $program = NutritionProgram::find($id);
        abort_unless(auth()->user()->can('update',$program),403);

        $data = $request->all();
        $data['coach_id']=auth()->user()->id;
        $data['day_type']= ($data['day_type']=='false' ? 0 : 1);
        $data['from'] = CalendarUtils::createCarbonFromFormat('Y-m-d', $data['from'])->toDateString();
        $program->update($data);
        $program->items()->delete();
        if ($request->has('items')) {
            foreach ($data['items'] as $key => $day) {
                foreach ($day as $item) {
                    $item['program_id'] = $program->id;
                    $item['day'] = $this->getDay($key,$program->day_type);
                    NutritionProgramItem::create($item);
                }
            }
        }

        return redirect()->route('panel.admin.nutrition-programs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = NutritionProgram::find($id);
        abort_unless(auth()->user()->can('delete',$program),403);

        $program->delete();
        return redirect()->back()->with([
            'is_deleted' => true
        ]);
    }

    public function getRatio(){
        $id = \request('id');
        $nutrition = Nutrition::find($id);
        return round($nutrition->calorie/$nutrition->gram,1);
    }

    public function updateItem(Request $request,$id){
        $item = NutritionProgramItem::find($id);
        $item->update($request->all());
        return response()->json([
            'id' => $item->id ,
            'nutrition' => $item->nutrition->name ,
            'nutrition_id' => $item->nutrition->id ,
            'meal' => $item->meal->name ,
            'meal_id' => $item->meal->id ,
            'gram' => $item->gram ,
            'calorie' => $item->calorie
        ]);
    }

    public function destroyItem($id){
        $item = NutritionProgramItem::find($id);
        $item->delete();
        return response()->json([
           'status' => 200
        ]);
    }

    public function exportPDF($id)
    {
        $program = NutritionProgram::find($id);
        abort_unless(auth()->user()->can('view',$program),403);

        return PDF::loadView('panel.nutrition_programs.pdf_en', compact('program'), [], [
            'format' => 'A5-L','mode' => 'utf-8'
        ])->stream('برنامه غذایی_'.$program->requester_name.'.pdf');
    }
}
