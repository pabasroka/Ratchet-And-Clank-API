<?php

namespace App\Http\Controllers;

use App\Http\Requests\GamesRequest;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{
    // GET
    public function index()
    {
        return response([
            'games' => Game::where('approve', 1)
                ->get()
        ], 200);
    }

    // GET BY ID
    public function show($id)
    {
        return response([
            'game' => Game::where('id', $id)
                ->where('approve', 1)
                ->get()
        ], 200);
    }

    // POST
    public function store(GamesRequest $request)
    {
        $validated = $request->validated();

        $newImageName = '';
        if ($request->image) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        }

        $approve = 0;
        if (Auth::check()) {
            $approve = 1;
        }

        $game = Game::create([
                'image' => $newImageName,
                'approve' => $approve,
            ] + $validated);

        return response([
            'game' => $game
        ], 201);
    }

    public function update(GamesRequest $request, $id)
    {
        $game = Game::findOrFail($id);

        if (!$game) {
            return response([
                'message' => 'Game not found'
            ], 403);
        }

        $validated = $request->validated();
        $approve = 0;
        if (isset($validated['approve'])) {
            $approve = 1;
        }

        $newImageName = '';
        if ($request->image) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        }

        $game->update([
                'image' => $newImageName,
                'approve' => $approve
            ] + $validated);

        return redirect('/admin')->with('message', 'Game updated successfully');
    }

    // VIEWS
    public function create()
    {
        return view('games.create');
    }

    // temporary view
    public function welcome()
    {
        $games = Game::get();
        return view('welcome', ['games' => $games]);
    }

}
