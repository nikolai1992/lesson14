<?php

namespace App\Http\Controllers;

use App\CarType;
use Illuminate\Http\Request;
use App\Car;
class CarTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $car_types = CarType::all();
        return view('car_types.index', compact('car_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cars = Car::whereDoesntHave('type')->get();
        return view('car_types.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $model = new CarType();
        $data = $request->all();
        unset($data['car_id']);
        $model = $model->create($data);
        Car::find($request->car_id)->update([
            'type_id' => $model->id
        ]);
        return redirect()->route('car_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $model = CarType::find($id);
        return view('car_types.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $model = CarType::find($id);
        $data = $request->all();

        $model->update($data);

        return redirect()->route('car_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        CarType::destroy($id);
        return redirect()->route('car_types.index');
    }
}
