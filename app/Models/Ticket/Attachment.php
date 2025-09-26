<?php

namespace App\Models\Ticket;

use App\Models\User;
use App\Models\Ticket\Ticket;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachments';

    protected $fillable = [
        'folder_path',
        'file_name',
        'extension',
        'url_evidence',
        'ticket_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
