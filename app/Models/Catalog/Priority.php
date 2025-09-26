<?php

namespace App\Models\Catalog;

use App\Models\Ticket\Ticket;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $table = 'priorities';

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
