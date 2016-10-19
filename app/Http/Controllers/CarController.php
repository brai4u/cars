<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Brand;
use App\Modelo;
use App\Car;
use App\Feature;

class CarController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();

        return view('cars')->with('cars', $cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validation

        $this->validate($request, [
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'kms' => 'required|numeric',
            'price' => 'required|numeric',
            'year' => 'required|date_format:Y-m-d'
        ]);


        $car = new Car();
        $car->year = $request->year;
        $car->color = $request->color;
        $car->modelo_id = $request->model;
        $car->kms = $request->kms;
        $car->price = $request->price;
        $car->save();

        $car->features()->sync($request->features);
        return redirect('show/' . $car->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cars = Car::find($id);
        
        if($cars){
            return view('car')->with('cars', $cars);
        }
        else {
            return "El id no existe";
        }
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
    }

    public function formcarsAdmin(){
        return view('formcars_admin');
    }

    public function formcarsVendedor(){
        $brands = Brand::all();
        $cars   = Car::all();
        //$brand = Brand::find(13);
        $modelos = Modelo::all();
        $features = Feature::all();
        
        return view('formcars_vendedor')->with('brands', $brands)
                                        ->with('cars', $cars)
                                        ->with('modelos', $modelos)
                                        ->with('features', $features);
    }

    public function llenardb(){

        //generate a brand
        $brand = new Brand();
        $brand->name = "Ford " . rand(1,100);
        $brand->save();

        //generate a modelos
        $modelo = new Modelo();
        $modelo->name = "Focus " . rand(1,100);
        $modelo->brand_id = $brand->id;
        $modelo->save();

        //generate a car
        $car = new Car();
        $car->year = "2016-02-10";
        $car->color = "red";
        $car->modelo_id = $modelo->id;
        $car->kms = "100";
        $car->price = "20000";
        $car->save();
    }
}
