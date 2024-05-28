<?php

namespace App\Http\Repository;

use App\Mail\Message\ReplyMail;
use App\Models\Message;
use App\Models\ReplyMessage;
use Illuminate\Support\Facades\Mail;

class ReplyMessageRepository
{
    public function getByIdMessage($message_id)
    {
        try {
            return ReplyMessage::where('message_id', $message_id)->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getMessage($message_id)
    {
        try {
            return Message::find($message_id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store($message_id, $request)
    {
        try {
            $reply = new ReplyMessage();
            $reply->message_id = $message_id;
            $reply->message = $request->message;
            // $reply->save();

            // send email
            $message = $this->getMessage($message_id);
            Mail::to($message->email)->send(new ReplyMail($message, $reply));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}