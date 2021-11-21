<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Traits\ApiResponse;
     */
    public function index()
    {
        $user = User::orderBy('point')->get();

        return $this->sendData($user);
    }
}
