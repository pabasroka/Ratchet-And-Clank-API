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
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{
    // GET
    public function index(): JsonResponse
    {
        $games = Game::where('approve', 1)
//            ->with('skillpoints:id,name,description,game_id,planet_id')
//            ->with('vehicles:id,name,image,game_id')
            ->get();

        $gamesJSON = [];
        foreach ($games as $game) {

            if ($game->image) {
                $game->image = public_path('images/games/' . $game->image);
            }

            $releases = [];
            foreach ($game->releases as $release) {
                $releases[] = [
                    'id' => $release->id,
                    'region' => $release->region,
                    'date' => $release->date,
                ];
            }

            $platforms = [];
            foreach ($game->platforms as $platform) {
                $platforms[] = [
                    'id' => $platform->id,
                    'name' => $platform->platform,
                ];
            }

            $skillPoints = [];
            foreach ($game->skillpoints as $skillpoint) {
                $skillPoints[] = [
                    'id' => $skillpoint->id,
                    'planet_id' => $skillpoint->planet_id,
                    'name' => $skillpoint->name,
                    'description' => $skillpoint->description,
                ];
            }

            $vehicles = [];
            foreach ($game->vehicles as $vehicle) {
                if ($vehicle->image) {
                    $vehicle->image = public_path('images/vehicles/' . $vehicle->image);
                }

                $vehicles[] = [
                    'id' => $vehicle->id,
                    'name' => $vehicle->name,
                    'image' => $vehicle->image,
                ];
            }


            $gamesJSON[] = [
                'id' => $game->id,
                'title' => $game->title,
                'subtitle' => $game->subtitle,
                'image' => $game->image,
                'developers' => $game->developers,
                'directors' => $game->directors,
                'composer' => $game->composer,
                'releases' => $releases,
                'platforms' => $platforms,
                'skill_points' => $skillPoints,
                'vehicles' => $vehicles,
            ];

        }

        // return response()->download(public_path('images/1640292616-Ratchet & Clank.jpg'));

        return response()->json($gamesJSON);
    }

    // GET BY ID
    public function show($id): JsonResponse
    {
        $game = Game::where('id', $id)
            ->where('approve', 1)
            ->firstOrFail();

        $game->makeHidden('approve')->toArray();

        if ($game->image) {
            $game->image = public_path('images/vehicles' . $game->image);
        }

        $releases = [];
        foreach ($game->releases as $release) {
            $releases[] = [
                'id' => $release->id,
                'region' => $release->region,
                'date' => $release->date,
            ];
        }

        $platforms = [];
        foreach ($game->platforms as $platform) {
            $platforms[] = [
                'id' => $platform->id,
                'name' => $platform->platform,
            ];
        }

        $skillPoints = [];
        foreach ($game->skillpoints as $skillpoint) {
            $skillPoints[] = [
                'id' => $skillpoint->id,
                'planet_id' => $skillpoint->planet_id,
                'name' => $skillpoint->name,
                'description' => $skillpoint->description,
            ];
        }

        $vehicles = [];
        foreach ($game->vehicles as $vehicle) {
            if ($vehicle->image) {
                $vehicle->image = public_path('images/vehicles/' . $vehicle->image);
            }

            $vehicles[] = [
                'id' => $vehicle->id,
                'name' => $vehicle->name,
                'image' => $vehicle->image,
            ];
        }

        $gameJSON = [
            'id' => $game->id,
            'title' => $game->title,
            'subtitle' => $game->subtitle,
            'image' => $game->image,
            'developers' => $game->developers,
            'directors' => $game->directors,
            'composer' => $game->composer,
            'releases' => $releases,
            'platforms' => $platforms,
            'skill_points' => $skillPoints,
            'vehicle' => $vehicles,
        ];

        return response()->json($gameJSON);
    }

    // POST
    public function store(GameFormRequest $request): Response|Redirector|RedirectResponse|Application|ResponseFactory
    {
        // Game
        $validated = $request->validated();

        $newImageName = '';
        if ($request->image) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images/games'), $newImageName);
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

        return redirect('/games')->with('message', 'Game created successfully');
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

        return redirect()->route('games.edit')->with('message', 'Game updated successfully');
    }

    // VIEWS
    public function create(): Factory|View|Application
    {
        return view('games.create');
    }

    public function edit(): Factory|View|Application
    {
        $games = Game::where('approve', 0)
            ->get();
        return view('games.edit', ['games' => $games]);
    }

    // temporary view
    public function welcome(): Factory|View|Application
    {
        $games = Game::get();
        return view('welcome', ['games' => $games]);
    }

}
