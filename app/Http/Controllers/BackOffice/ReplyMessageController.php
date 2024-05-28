<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Http\Repository\ReplyMessageRepository;
use App\Http\Requests\ReplyMessageRequest;
use Illuminate\Http\Request;

class ReplyMessageController extends Controller
{
    private $replyMessageRepository;

    public function __construct(ReplyMessageRepository $replyMessageRepository)
    {
        $this->replyMessageRepository = $replyMessageRepository;
    }

    public function store(ReplyMessageRequest $request, $message_id)
    {   
        try {
            $this->replyMessageRepository->store($message_id, $request);
            $message = $this->replyMessageRepository->getMessage($message_id);
            return redirect()->back()->with('success', 'Pesan telah dikirim ke '. $message->email);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
