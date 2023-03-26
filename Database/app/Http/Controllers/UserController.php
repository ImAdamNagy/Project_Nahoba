<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Http\Requests\SignUpUserRequest;
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
                return response()->json(["data"=> new UserResource(Auth::user())],200);
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
        $users = User::all();
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SignUpUserRequest $request)
    {
        $newuser = new User($request->validated());
        $newuser->password = Hash::make($request->validated()['password']);
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
    public function update(SignUpUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->password = Hash::make($request->validated()['password']);
        $user->save();
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
    }
}
