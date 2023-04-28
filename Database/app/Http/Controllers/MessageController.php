<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Chat;
use App\Http\Resources\MessageResource;
use App\Http\Resources\ChatResource;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Chat $chat)
    {
        $messages = Message::where("chat_id", $chat->id)->get();
        return MessageResource::collection($messages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        $newmessage = new Message($request->validated());
        $newmessage->save();
        return new MessageResource($newmessage);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return new MessageResource($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userid)
    {
        $data = Chat::all();

        for($i = 0; $i < count($data); $i++)
        {
            if($data[$i]['from'] == $userid || $data[$i]['to'] == $userid)
            {
                $messages = Message::where("chat_id", $data[$i]['id'])->get();
                for($j = 0; $j < count($messages); $j++)
                {
                    $messages[$j]->delete();
                }
            }
        }
    }
}