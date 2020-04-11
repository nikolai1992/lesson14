<?php

namespace App\Http\Controllers;

use App\CarType;
use Illuminate\Http\Request;
use App\Car;
use Image;
class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $model = new Car();
        $cars = Car::all();
        $car = "Cars";
        return view('cars.index', compact('model', 'car', 'cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types = CarType::all();
        return view('cars.create', compact('types'));
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
        $data = $request->all();
        $model = new Car();
        if($request->file('image'))
        {
            $logo = $request->file('image');
            $filename = random_int(10000000, 99999999).time().".".$logo->getClientOriginalExtension();
            Image::make($logo)->save(public_path('image/'.$filename));
            $image2 = '/image/'.$filename;
            $data["image"] = $image2;
        }

        $model->create($data);
        return redirect()->route('cars.index');
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
        $model = Car::find($id);
        $types = CarType::all();
        return view('cars.edit', compact('model', 'types'));
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
        $model = Car::find($id);
        $data = $request->all();

        if($request->file('image'))
        {
            $logo = $request->file('image');
            $filename = random_int(10000000, 99999999).time().".".$logo->getClientOriginalExtension();
            Image::make($logo)->save(public_path('image/'.$filename));
            $image2 = '/image/'.$filename;
            $data["image"] = $image2;
        }

        $model->update($data);
        return redirect()->route('cars.index');
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
        Car::destroy($id);
        return redirect()->route('cars.index');
    }
}
