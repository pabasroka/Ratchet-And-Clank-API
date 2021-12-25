<?php

namespace App\Http\Controllers;

use App\Http\Requests\GamesRequest;
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

    // GET BY ID
    public function show($id)
    {
        return response([
            'game' => Games::where('id', $id)
                ->get()
        ], 200);
    }

    // POST
    public function store(GamesRequest $request)
    {
        $validated = $request->validated();

        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $game = Games::create([
            'image' => $newImageName
        ] + $validated);

        return response([
            'game' => $game
        ], 201);
    }

    public function create()
    {
        return view('games.create');
    }

    // temporary view
    public function welcome()
    {
        $games = Games::get();
        return view('welcome', ['games' => $games]);
    }

}
