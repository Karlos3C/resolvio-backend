<?php

namespace App\Services\Ticket;

use App\Helpers\GenerateFolioHelper;
use App\Models\Ticket\Ticket;

class TicketService
{
    public function createTicket(array $data): Ticket
    {
        $data['folio'] = GenerateFolioHelper::generateFolio();
        $data['ticket_status_id'] = 1;
        $data['user_id'] = auth()->id();
        $ticket = Ticket::create($data);
        return $ticket;
    }

    public function updateTicket(Ticket $ticket, array $data): Ticket
    {
        $ticket->update($data);
        return $ticket;
    }

    public function deleteTicket(Ticket $ticket): void
    {
        $ticket->delete();
    }

    public function listTickets(array $filters = []): array
    {
        $tickets = Ticket::filterTickets($filters);
        return $tickets;
    }
}
