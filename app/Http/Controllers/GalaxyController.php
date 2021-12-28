<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalaxyRequest;
use App\Models\Galaxy;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class GalaxyController extends Controller
{
    public function index(): Response|Application|ResponseFactory
    {
        return response([
            'galaxies' => Galaxy::where('approve', 1)
                ->get()
        ], 200);
    }

    public function show($id): Response|Application|ResponseFactory
    {
        $galaxy = Galaxy::where('id', $id)
            ->where('approve', 1)
            ->get();

        return response([
            'galaxy' => $galaxy
        ], 200);
    }

    public function store(GalaxyRequest $request)
    {
        $validated = $request->validated();

        $approve = 0;
        if (Auth::check()) {
            $approve = 1;
        }

        Galaxy::create([
            'approve' => $approve,
        ] + $validated);

        return redirect('/galaxies')->with('message', 'Galaxy created successfully');
    }

    public function update(GalaxyRequest $request, $id)
    {
        $galaxy = Galaxy::findOrFail($id);

        if (!$galaxy) {
            return response([
                'message' => 'Galaxy not found'
            ], 403);
        }

        $validated = $request->validated();
        $approve = 0;
        if (isset($validated['approve'])) {
            $approve = 1;
        }

        $galaxy->update([
                'approve' => $approve
            ] + $validated);

        return redirect()->route('galaxies.edit')->with('message', 'Galaxy updated successfully');
    }

    public function create(): Factory|View|Application
    {
        return view('galaxies.create');
    }

    public function edit(): Factory|View|Application
    {
        $galaxies = Galaxy::where('approve', 0)->get();
        return view('galaxies.edit', ['galaxies' => $galaxies]);
    }

    public function destroy($id)
    {
        $galaxy = Galaxy::findOrFail($id);
        $galaxy->delete();
        return redirect()->route('galaxies.edit')->with('message', 'Galaxy deleted successfully');
    }
}
