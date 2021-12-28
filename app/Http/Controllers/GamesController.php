<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameFormRequest;
use App\Http\Requests\GameRequest;
use App\Http\Requests\PlatformRequest;
use App\Models\Game;
use App\Models\Platform;
use App\Models\Release;
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
    public function show($id): Response|Application|ResponseFactory
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
    public function store(GameFormRequest $request): Response|Application|ResponseFactory
    {
        // Game
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


        // Platform
        $platform = new Platform();
        $platform->game_id = $game->id;
        $platform->platform = $validated['platform'];
        $platform->approve = $approve;
        $game->platforms()->save($platform);

        // Releases
        $releases = [];
        $length = count($request['date']) ?? 0;
        for ($i = 0; $i < $length; $i++) {
            $release = new Release();
            $release->game_id = $game->id;
            $release->date = $request['date'][$i];
            $release->region = $request['region'][$i];
            $release->approve = $approve;
            $releases[] = $release;
            $game->releases()->save($release);
        }

        return response([
            'game' => $game,
            'platform' => $platform,
            'releases' => $releases
        ], 201);
    }

    public function update(GameFormRequest $request, $id): Response|Redirector|RedirectResponse|Application|ResponseFactory
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

        $newImageName = $game->image ?? '';
        if ($request->image) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        }

        $game->update([
                'image' => $newImageName,
                'approve' => $approve
            ] + $validated);

        // Platform
        $platform = Platform::where('game_id', $game->id)->firstOrFail();
        $platform->platform = $validated['platform'];
        $platform->approve = $approve;
        $game->platforms()->save($platform);

        // Releases TODO cannot change date
        $length = count($request['date']) ?? 0;
        for ($i = 0; $i < $length; $i++) {
            $release = Release::where('game_id', $game->id)->get();
            $release->date = $request['date'][$i];
            $release->region = $request['region'][$i];
            foreach ($release as $r) {
                $r->approve = $approve;
                $game->releases()->save($r);
            }
        }

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
