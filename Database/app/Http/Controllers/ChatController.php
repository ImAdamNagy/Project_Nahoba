<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Resources\ChatResource;
use App\Http\Requests\ChatRequest;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findchat()
    {
        $chatsfrom = Chat::where("from","=",Auth::id())->get();
        $chatsto = Chat::where("to","=",Auth::id())->get();
        $chats = $chatsfrom->merge($chatsto);
        return ChatResource::collection($chats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChatRequest $request)
    {
        $newchat = new Chat($request->validated());
        $newchat->from = Auth::id();
        $newchat->save();
        return new ChatResource($newchat);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        return new ChatResource($chat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chat = Chat::findOrFail($id)->delete();
    }
}
