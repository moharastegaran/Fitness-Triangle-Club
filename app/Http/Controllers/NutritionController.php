<?php

namespace App\Http\Controllers;

use App\Nutrition;
use function foo\func;
use Illuminate\Http\Request;

class NutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nuts = Nutrition::orderBy('id', 'DESC')->get();
        return view('nutrition.index', compact('nuts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nuts = Nutrition::all();
        return view('panel.nutrition.create', compact('nuts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filtered_data = collect($request->data)->reject(function ($item) {
            return (!isset($item[0]) || !isset($item[1]) || !isset($item[2]));
        });
        if (count($filtered_data)) {
            foreach ($filtered_data as $data) {
                $_data[] = [
                    'name' => $data[0],
                    'gram' => $data[1],
                    'calorie' => $data[2]
                ];
            }
            Nutrition::insert($_data);
        }
        return redirect()->route('panel.admin.nutrition.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nutrition = Nutrition::find($id);
        $nutrition->update($request->all());
        return response()->json($nutrition);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        return $id;
        $nutrition = Nutrition::find($id);
        $nutrition->delete();
        return response()->json([
            'status' => 200
        ]);
    }
}
