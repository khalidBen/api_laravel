<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::select("id","user_id","model","price")->get();
        if ($cars->count() <= 0)
            return "pas de voitures.";
        return $cars;
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $car=Car::create($request->all());
        return ["data"=> $car,"messge"=>"voiture ajoutée"];
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return $car;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
