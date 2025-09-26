<?php

namespace App\Http\Resources\Ticket;

use App\Helpers\FormDateHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'folio' => $this->folio,
            'title' => $this->title,
            'description' => $this->description,
            'issue' => [
                'id' => $this->issue->id,
                'name' => $this->issue->name,
            ],
            'priority' => [
                'id' => $this->priority->id,
                'name' => $this->priority->name,
            ],
            'responsable' => $this->responsable ? [
                'id' => $this->responsable->id,
                'full_name' => $this->responsable->full_name,
            ] : null,
            'ticket_status' => [
                'id' => $this->ticketStatus->id,
                'name' => $this->ticketStatus->name,
            ],
            'user' => $this->user->full_name,
            'limit_date' => $this->limit_date ? FormDateHelper::formatLongDate($this->limit_date) : null,
            'tags' => $this->tags,
            'created_at' => FormDateHelper::formatLongDate($this->created_at),
            'updated_at' => FormDateHelper::formatLongDate($this->updated_at),
        ];
    }
}
