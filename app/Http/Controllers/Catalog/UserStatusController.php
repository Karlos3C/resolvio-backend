<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Models\Catalog\UserStatus;
use App\Http\Controllers\Controller;

class UserStatusController extends Controller
{
    public function index()
    {
        return response(['data' => UserStatus::all()]);
    }
}
