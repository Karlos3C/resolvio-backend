<?php

namespace App\Models\Ticket;

use App\Models\User;
use App\Models\Ticket\Comment;
use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    protected $table = 'reply_comments';
    protected $fillable = [
        'comment_id',
        'user_id',
        'body',
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
