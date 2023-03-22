<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Http\Requests\SignInUserRequest;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function authenticate(LoginUserRequest $request)
    {
        $data = $request->validated();
        if(Auth::attempt($data)){
            if($request->wantsJson()){
                return response()->json(["data"=>new UserResource(Auth::user())],200);
            }
        }
        else{
            if ($request->wantsJson()){
                return  response()->json(["data"=>["message"=>"Sikertelen belépés"]],401);
            }
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return UserResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $newuser = new User();
        $newuser->username = $request->validated()['username'];
        $newuser->password = Hash::make($request->validated()['password']);
        $newuser->firstname = $request->validated()['firstname'];
        $newuser->lastname = $request->validated()['lastname'];
        $newuser->tel = $request->validated()['tel'];
        $newuser->email = $request->validated()['email'];
        $newuser->address = $request->validated()['address'];
        $newuser->save();
        return new UserResource($newuser);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return new UserResource($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SignInUserRequest $request, $id)
    {
        $data = User::findOrFail($id);
        $data->username = $request->validated()['username'];
        $data->password = Hash::make($request->validated()['password']);
        $data->firstname = $request->validated()['firstname'];
        $data->lastname = $request->validated()['lastname'];
        $data->tel = $request->validated()['tel'];
        $data->email = $request->validated()['email'];
        $data->address = $request->validated()['address'];
        $data->save();
        return new UserResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id)->delete();
    }
}
