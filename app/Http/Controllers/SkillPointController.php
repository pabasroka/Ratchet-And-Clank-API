<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillPointRequest;
use App\Models\Game;
use App\Models\Planet;
use App\Models\SkillPoint;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SkillPointController extends Controller
{
    public function index(): JsonResponse
    {
        $skillPoints = SkillPoint::where('approve', 1)
            ->get();

        $skillPointsJSON = [];
        foreach ($skillPoints as $skillPoint) {
            $skillPointsJSON[] = [
                'id' => $skillPoint->id,
                'game_id' => $skillPoint->game_id,
                'planet_id' => $skillPoint->planet_id,
                'name' => $skillPoint->name,
                'description' => $skillPoint->description,
            ];
        }

        return response()->json($skillPointsJSON);
    }

    public function show($id): JsonResponse
    {
        $skillPoint = SkillPoint::where('id', $id)
            ->where('approve', 1)
            ->firstOrFail();

        $skillPointJSON = [
            'id' => $skillPoint->id,
            'game_id' => $skillPoint->game_id,
            'planet_id' => $skillPoint->planet_id,
            'name' => $skillPoint->name,
            'description' => $skillPoint->description,
        ];

        return response()->json($skillPointJSON);
    }

    public function store(SkillPointRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $approve = 0;
        if (Auth::check()) {
            $approve = 1;
        }

        SkillPoint::create([
                'approve' => $approve,
            ] + $validated);

        return redirect()->route('skillpoints.create')->with('message', 'Skill Point created successfully');
    }

    public function update(SkillPointRequest $request, $id): Response|RedirectResponse|Application|ResponseFactory
    {
        $skillPoint = SkillPoint::findOrFail($id);

        if (!$skillPoint) {
            return response([
                'message' => 'Skill point not found'
            ], 403);
        }

        $validated = $request->validated();
        $approve = 0;
        if (isset($validated['approve'])) {
            $approve = 1;
        }

        $skillPoint->update([
                'approve' => $approve
            ] + $validated);

        return redirect()->route('skillpoints.edit')->with('message', 'Skill Point updated successfully');
    }

    public function create(): Factory|View|Application
    {
        $planets = Planet::where('approve', 1)->get();
        $games = Game::where('approve', 1)->get();
        return view('skillpoints.create', ['planets' => $planets, 'games' => $games]);
    }

    public function edit(): Factory|View|Application
    {
        $skillPoint = SkillPoint::where('approve', 0)->get();
        return view('skillpoints.edit', ['skillPoints' => $skillPoint]);
    }

    public function destroy($id): RedirectResponse
    {
        $skillPoint = SkillPoint::findOrFail($id);
        $skillPoint->delete();
        return redirect()->route('skillpoints.edit')->with('message', 'Skill Point deleted successfully');
    }
}
