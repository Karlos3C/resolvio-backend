<?php

namespace App\Models\Catalog;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
