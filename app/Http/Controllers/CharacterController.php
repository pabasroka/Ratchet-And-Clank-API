<?php

namespace App\Http\Controllers;

use App\Http\Requests\CharacterRequest;
use App\Models\Character;
use App\Models\Galaxy;
use App\Models\Game;
use App\Models\Race;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{
    public function index(): JsonResponse
    {
        $characters = Character::where('approve', 1)
            ->get();

        $charactersJSON = [];
        foreach ($characters as $character) {

            if ($character->image) {
                $character->image = public_path('images/characters/' . $character->image);
            }

            $charactersJSON[] = [
                'id' => $character->id,
                'game_id' => $character->game_id,
                'galaxy_id' => $character->galaxy_id,
                'race_id' => $character->race_id,
                'name' => $character->name,
                'gender' => $character->gender,
                'state' => $character->state,
                'eyes' => $character->eyes,
                'skin' => $character->skin,
                'hair' => $character->hair,
                'image' => $character->image,
            ];
        }

        return response()->json($charactersJSON);
    }

    public function show($id): JsonResponse
    {
        $character = Character::where('id', $id)
            ->where('approve', 1)
            ->firstOrFail();

        if ($character->image) {
            $character->image = public_path('images/characters/' . $character->image);
        }

        $characterJSON = [
            'id' => $character->id,
            'game_id' => $character->game_id,
            'galaxy_id' => $character->galaxy_id,
            'race_id' => $character->race_id,
            'name' => $character->name,
            'gender' => $character->gender,
            'state' => $character->state,
            'eyes' => $character->eyes,
            'skin' => $character->skin,
            'hair' => $character->hair,
            'image' => $character->image,
        ];

        return response()->json($characterJSON);
    }

    public function store(CharacterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $newImageName = '';
        if ($request->image) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images/characters'), $newImageName);
        }

        $approve = 0;
        if (Auth::check()) {
            $approve = 1;
        }

        Character::create([
                'image' => $newImageName,
                'approve' => $approve,
            ] + $validated);

        return redirect()->route('characters.create')->with('message', 'Character created successfully');
    }

    public function update(CharacterRequest $request, $id): Response|RedirectResponse|Application|ResponseFactory
    {
        $character = Character::findOrFail($id);

        if (!$character) {
            return response([
                'message' => 'Character not found'
            ], 403);
        }

        $validated = $request->validated();
        $approve = 0;
        if (isset($validated['approve'])) {
            $approve = 1;
        }

        $character->update([
                'approve' => $approve
            ] + $validated);

        return redirect()->route('characters.edit')->with('message', 'Character updated successfully');
    }

    public function destroy($id)
    {
        $gadget = Character::findOrFail($id);
        $gadget->delete();
        return redirect()->route('characters.edit')->with('message', 'Character deleted successfully');
    }

    public function create(): Factory|View|Application
    {
        $games = Game::where('approve', 1)->get();
        $races = Race::where('approve', 1)->get();
        $galaxies = Galaxy::where('approve', 1)->get();
//        $locations = Location::where('approve', 1)->get(); //TODO add locations table

        return view('characters.create', [
            'games' => $games,
            'races' => $races,
            'galaxies' => $galaxies,
//            'locations' => $locations,
        ]);
    }

    public function edit(): Factory|View|Application
    {
        $characters = Character::where('approve', 0)->get();
        return view('characters.edit', ['characters' => $characters]);
    }
}
