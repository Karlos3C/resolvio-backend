<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket\TicketStatus;
use Illuminate\Http\Request;

class TicketStatusController extends Controller
{
    public function index()
    {
        $statuses = TicketStatus::all();
        return response(["data" => $statuses]);
    }
}
