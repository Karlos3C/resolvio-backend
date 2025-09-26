<?php

namespace App\Models\Ticket;

use App\Models\User;
use App\Models\Ticket\Ticket;
use App\Models\Ticket\ReplyComment;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body',
        'url_evidence',
        'extension',
        'file_name',
        'ticket_id',
        'user_id',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replyComments()
    {
        return $this->hasMany(ReplyComment::class);
    }
}
