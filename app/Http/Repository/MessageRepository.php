<?php

namespace App\Http\Repository;

use App\Models\Message;

class MessageRepository
{
    public function getAll()
    {
        try {
            return Message::orderBy('id', 'desc')->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store($request)
    {
        try {
            $message = new Message();
            $message->name = $request->name;
            $message->email = $request->email;
            $message->message = $request->message;
            $message->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}