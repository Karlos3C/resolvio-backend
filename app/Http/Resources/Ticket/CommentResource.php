<?php

namespace App\Http\Resources\Ticket;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'body' => $this->body,
            'user' => $this->user->full_name,
            'url_evidence' => $this->url_evidence,
            'file_name' => $this->file_name,
            'extension' => $this->extension,
            'created_at' => $this->created_at
        ];
    }
}
