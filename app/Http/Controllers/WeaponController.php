<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeaponRequest;
use App\Models\Game;
use App\Models\Weapon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class WeaponController extends Controller
{
    public function index(): JsonResponse
    {
        $weapons = Weapon::where('approve', 1)
            ->get();

        $weaponsJSON = [];
        foreach ($weapons as $weapon) {
            if ($weapon->image) {
                $weapon->image = public_path('images/weapons/' . $weapon->image);
            }

            $weaponEvolution = [];
            foreach ($weapon->weaponsEvolution as $item) {
                if ($item->image) {
                    $item->image = public_path('images/weapons/' . $item->image);
                }
                
                $weaponEvolution[] = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'max_level' => $item->max_level,
                    'price' => $item->price,
                    'range' => $item->range,
                    'rate_of_fire' => $item->rate_of_fire,
                    'image' => $item->image,
                ];
            }



            $weaponsJSON[] = [
                'id' => $weapon->id,
                'first_appearance' => $weapon->game_id,
                'name' => $weapon->name,
                'price' => $weapon->price,
                'range' => $weapon->range,
                'rate_of_fire' => $weapon->rate_of_fire,
                'image' => $weapon->image,
                'upgrade' => $weaponEvolution,
            ];
        }

        return response()->json($weaponsJSON);
    }

    public function show($id): JsonResponse
    {
        $weapon = Weapon::where('id', $id)
            ->where('approve', 1)
            ->firstOrFail();

        if ($weapon->image) {
            $weapon->image = public_path('images/weapons/' . $weapon->image);
        }

        $weaponJSON = [
            'id' => $weapon->id,
            'first_appearance' => $weapon->game_id,
            'name' => $weapon->name,
            'price' => $weapon->price,
            'range' => $weapon->range,
            'rate_of_fire' => $weapon->rate_of_fire,
            'image' => $weapon->image
        ];

        return response()->json($weaponJSON);
    }

    public function store(WeaponRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $newImageName = '';
        if ($request->image) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images/weapons'), $newImageName);
        }

        $approve = 0;
        if (Auth::check()) {
            $approve = 1;
        }

        Weapon::create([
                'approve' => $approve,
                'image' => $newImageName,
            ] + $validated);

        return redirect()->route('weapons.create')->with('message', 'Weapon created successfully');
    }

    public function update(WeaponRequest $request, $id): Response|RedirectResponse|Application|ResponseFactory
    {
        $weapon = Weapon::findOrFail($id);

        if (!$weapon) {
            return response([
                'message' => 'Weapon not found'
            ], 403);
        }

        $validated = $request->validated();
        $approve = 0;
        if (isset($validated['approve'])) {
            $approve = 1;
        }

        $weapon->update([
                'approve' => $approve
            ] + $validated);

        return redirect()->route('weapons.edit')->with('message', 'Weapon updated successfully');
    }

    public function destroy($id)
    {
        $weapon = Weapon::findOrFail($id);
        $weapon->delete();
        return redirect()->route('weapons.edit')->with('message', 'Weapon deleted successfully');
    }

    public function create(): Factory|View|Application
    {
        $weapons = Weapon::where('approve', 1)->get();
        $games = Game::where('approve', 1)->get();
        return view('weapons.create', [
            'weapons' => $weapons,
            'games' => $games,
        ]);
    }

    public function edit(): Factory|View|Application
    {
        $weapons = Weapon::where('approve', 0)->get();
        return view('weapons.edit', ['weapons' => $weapons]);
    }
}
