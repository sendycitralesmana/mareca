<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Http\Repository\MessageRepository;
use App\Http\Requests\MessageRequest;
use Illuminate\Http\Request;

class FOMessageController extends Controller
{
    private $messageRepository;
    
    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function store(MessageRequest $request)
    {
        try {
            $this->messageRepository->store($request);
            return redirect()->back()->with('success', 'Pesan anda telah terkirim');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
