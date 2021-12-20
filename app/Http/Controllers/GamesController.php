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

    public function show($id)
    {
        return response([
            'game' => Games::where('id', $id)
                ->get()
        ], 200);
    }

    public function store(Request $request)
    {
        $attrs = $request->validate([
            'body' => 'required|string'
        ]);

        $image = $this->saveImage($request->image, 'games');

        $game = Games::create([
            'body' => $attrs['body'],
            'image' => $image
        ]);

        return response([
            'message' => 'Game created',
            'game' => $game
        ], 201);
    }

    public function create()
    {
        return view('games.create');
    }
}
