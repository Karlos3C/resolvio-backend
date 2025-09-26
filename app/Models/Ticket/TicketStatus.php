<?php

namespace App\Models\Ticket;

use App\Models\Ticket\Ticket;
use Illuminate\Database\Eloquent\Model;

class TicketStatus extends Model
{
    protected $table = 'ticket_status';

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
