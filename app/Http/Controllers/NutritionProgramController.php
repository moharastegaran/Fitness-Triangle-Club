<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramRequest;
use App\Meal;
use App\Nutrition;
use App\NutritionProgram;
use App\NutritionProgramItem;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

class NutritionProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $nutritions = Nutrition::all();
        $meals = Meal::all();
        return view('panel.nutrition_programs.create',compact('nutritions','meals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProgramRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramRequest $request)
    {
        $data = $request->all();
        $data['coach_id']=auth()->user()->id;
        $data['from'] = CalendarUtils::createCarbonFromFormat('Y-m-d', $data['from'])->toDateString();
        $program = NutritionProgram::create($data);
        if ($request->has('items')) {
            foreach ($data['items'] as $key => $day) {
                foreach ($day as $item) {
                    $item['program_id'] = $program->id;
                    $item['day'] = $this->getDay($key);
                    NutritionProgramItem::create($item);
                }
            }
        }
        return redirect()->route('panel.admin.nutrition-programs.index');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = NutritionProgram::find($id);
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
        $nutritions = Nutrition::all();
        $meals = Meal::all();
        return view('panel..nutrition_programs.edit',compact('program','nutritions','meals'));
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
        $data = $request->all();
//        dd($data);
        $data['coach_id']=auth()->user()->id;
        $data['from'] = CalendarUtils::createCarbonFromFormat('Y-m-d', $data['from'])->toDateString();
        $program->update($data);
        $program->items()->delete();
        if ($request->has('items')) {
            foreach ($data['items'] as $key => $day) {
                foreach ($day as $item) {
                    $item['program_id'] = $program->id;
                    $item['day'] = $this->getDay($key);
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
}
