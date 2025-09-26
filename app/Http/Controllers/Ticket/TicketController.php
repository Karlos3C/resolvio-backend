<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\StoreTicketRequest;
use App\Http\Requests\Ticket\UpdateTicketRequest;
use App\Http\Resources\Ticket\TicketCollection;
use App\Http\Resources\Ticket\TicketResource;
use App\Models\Ticket\Ticket;
use App\Services\Ticket\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct(private TicketService $ticket_service) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        return new TicketCollection($tickets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        try {
            $ticket = $this->ticket_service->createTicket($request->validated());
            return response([
                'message' => 'Ticket creado correctamente',
                'data' => $ticket
            ], 201);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al validar los datos',
                'error' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return new TicketResource($ticket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        try {
            $ticket = $this->ticket_service->updateTicket($ticket, $request->validated());
            return response([
                'message' => 'Ticket actualizado correctamente',
                'data' => $ticket
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al actualizar el ticket',
                'error' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        try {
            $this->ticket_service->deleteTicket($ticket);
            return response([
                'message' => 'Ticket eliminado correctamente'
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al eliminar el ticket',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function filterTickets(Request $request)
    {
        $tickets = $this->ticket_service->listTickets($request->all());
        return new TicketCollection($tickets);
    }
}
