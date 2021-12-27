<?php

namespace App\Http\Controllers;

use App\Http\Requests\GamesRequest;
use App\Models\Game;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{
    // GET
    public function index(): Response|Application|ResponseFactory
    {
        $games = Game::where('approve', 1)
            ->get();

        foreach ($games as $game) {
            if ($game->image) {
                $game->image = public_path('images/' . $game->image);
            }
        }
        //        return response()->download(public_path('images/1640292616-Ratchet & Clank.jpg'));

        return response([
            'games' => $games
        ], 200);
    }

    // GET BY ID
    public function show($id)
    {
        $game = Game::where('id', $id)
            ->where('approve', 1)
            ->get();

        if ($game[0]->image) {
            $game[0]->image = public_path('images/' . $game[0]->image);
        }

        return response([
            'game' => $game
        ], 200);
    }

    // POST
    public function store(GamesRequest $request): Response|Application|ResponseFactory
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

    public function update(GamesRequest $request, $id): Response|Redirector|RedirectResponse|Application|ResponseFactory
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
    public function create(): Factory|View|Application
    {
        return view('games.create');
    }

    // temporary view
    public function welcome(): Factory|View|Application
    {
        $games = Game::get();
        return view('welcome', ['games' => $games]);
    }

}
