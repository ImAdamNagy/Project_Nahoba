<?php

namespace App\Http\Controllers;
use App\Models\CarType;
use Illuminate\Http\Request;
use App\Http\Resources\CarTypeResource;
use App\Http\Requests\CarTypeRequest;

class CarTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CarType::all();
        return CarTypeResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarTypeRequest $request)
    {
        $newcartype = new CarType($request->validated());
        $newcartype->save();
        return new CarTypeResource($newcartype);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CarType $cartype)
    {
        return new CarType($cartype);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarType $cartype)
    {
        $cartype->delete();
    }
}
