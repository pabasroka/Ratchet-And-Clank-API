<?php

namespace App\Http\Controllers;

use App\Http\Requests\RaceRequest;
use App\Models\Race;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class RaceController extends Controller
{
    public function index(): Response|Application|ResponseFactory
    {
        $races = Race::where('approve', 1)
            ->get();

        $races->makeHidden('approve')->toArray();

        return response([
            'races' => $races
        ], 200);
    }

    public function show($id): Response|Application|ResponseFactory
    {
        $race = Race::where('id', $id)
            ->where('approve', 1)
            ->get();

        $race->makeHidden('approve')->toArray();

        return response([
            'race' => $race
        ], 200);
    }

    public function store(RaceRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $approve = 0;
        if (Auth::check()) {
            $approve = 1;
        }

        Race::create([
                'approve' => $approve,
            ] + $validated);

        return redirect()->route('races.create')->with('message', 'Race created successfully');
    }

    public function update(RaceRequest $request, $id)
    {
        $race = Race::findOrFail($id);

        if (!$race) {
            return response([
                'message' => 'Race not found'
            ], 403);
        }

        $validated = $request->validated();
        $approve = 0;
        if (isset($validated['approve'])) {
            $approve = 1;
        }

        $race->update([
            'approve' => $approve
        ] + $validated);

        return redirect()->route('races.edit')->with('message', 'Race updated successfully');
    }

    public function destroy($id)
    {
        $race = Race::findOrFail($id);
        $race->delete();
        return redirect()->route('races.edit')->with('message', 'Race deleted successfully');
    }

    public function edit(): Factory|View|Application
    {
        $races = Race::where('approve', 0)->get();
        return view('races.edit', ['races' => $races]);
    }

    public function create(): Factory|View|Application
    {
        return view('races.create');
    }
}
