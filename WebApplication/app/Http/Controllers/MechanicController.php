<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\MechanicResource;
use App\Models\Mechanic;
use App\Http\Requests\MechanicRequest;
use App\Http\Requests\MechanicUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class MechanicController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mechanics = Mechanic::all();
        return MechanicResource::collection($mechanics);
    }

    public function currentMechanic()
    {
        $mechanic = Mechanic::where('user_id',Auth::id())->get();
        return new MechanicResource($mechanic[0]);
    }

    public function currentUserHasMechanic()
    {
        $mechanics = Auth::user()->Mechanic;
        return $mechanics;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MechanicRequest $request)
    {
        $file = $request->file('img');
        $file_name = time() . "." . $file->getClientOriginalName();
        $file->move(public_path('images'), $file_name);

        $newmechanic = new Mechanic($request->validated());
        $newmechanic->user_id=Auth::id();
        $newmechanic->profile_pic=$file_name;
        $newmechanic->save();
        return new MechanicResource($newmechanic);
    }

    /**
 * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mechanic::findOrFail($id);
        return new MechanicResource($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MechanicUpdateRequest $request, Mechanic $mechanic)
    {
        $mechanic->update($request->validated());
        $mechanic->save();
        return new MechanicResource($mechanic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($mechanic)
    {
        $mechanic = Mechanic::where('user_id', $mechanic)->delete();
    }
}
