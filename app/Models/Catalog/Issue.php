<?php

namespace App\Models\Catalog;

use App\Models\Ticket\Ticket;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $table = 'issues';
    protected $fillable = ['name'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
