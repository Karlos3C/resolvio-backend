<?php

namespace App\Models\Ticket;

use App\Models\User;
use App\Models\Catalog\Issue;
use App\Models\Ticket\Comment;
use App\Models\Catalog\Priority;
use App\Models\Ticket\Attachment;
use App\Models\Ticket\TicketStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'folio',
        'title',
        'description',
        'issue_id',
        'priority_id',
        'responsable_id',
        'ticket_status_id',
        'user_id',
        'limit_date',
        'tags',
    ];

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }
    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }
    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }
    public function ticketStatus()
    {
        return $this->belongsTo(TicketStatus::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilterTickets(Builder $query, array $filters)
    {
        if (isset($filters['search'])) {
            $query->where('folio', 'like', '%' . $filters['search'] . '%')
                ->orWhere('title', 'like', '%' . $filters['search'] . '%');
        }

        if (isset($filters['issue'])) {
            $query->where('issue_id', $filters['issue']);
        }
        if (isset($filters['priority'])) {
            $query->where('priority_id', $filters['priority']);
        }
        if (isset($filters['responsable'])) {
            $query->where('responsable_id', $filters['responsable']);
        }
        if (isset($filters['ticket_status'])) {
            $query->where('ticket_status_id', $filters['ticket_status']);
        }
        if (isset($filters['user'])) {
            $query->where('user_id', $filters['user']);
        }

        return $query->get();
    }
}
