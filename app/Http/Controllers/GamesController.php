<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    // GET
    public function index()
    {
        return response([
            'games' => Games::get()
        ], 200);
    }

    public function test(): string
    {
        return "test";
    }

    public function xd(): string
    {
        return "xd";
    }
}
