<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    public function replyMessage(): HasMany
    {
        return $this->hasMany(ReplyMessage::class, 'message_id', 'id');
    }
}
