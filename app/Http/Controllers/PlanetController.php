<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanetRequest;
use App\Models\Galaxy;
use App\Models\Planet;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PlanetController extends Controller
{
    public function index()
    {
        $planets = Planet::where('approve', 1)
            ->get();

        $planetsJSON = [];
        foreach ($planets as $planet) {
            if ($planet->image) {
                $planet->image = public_path('images/planets/' . $planet->image);
            }

            $planetsJSON[] = [
                'id' => $planet->id,
                'galaxy_id' => $planet->galaxy_id,
                'name' => $planet->name,
                'description' => $planet->description,
                'image' => $planet->image,
            ];
        }

        return response()->json($planetsJSON);
    }

    public function show($id): JsonResponse
    {
        $planet = Planet::where('id', $id)
            ->where('approve', 1)
            ->firstOrFail();

        if ($planet->image) {
            $planet->image = public_path('images/planets/' . $planet->image);
        }

       $planetJSON = [
           'id' => $planet->id,
           'galaxy_id' => $planet->galaxy_id,
           'name' => $planet->name,
           'description' => $planet->description,
           'image' => $planet->image,
       ];

        return response()->json($planetJSON);
    }

    public function store(PlanetRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $newImageName = '';
        if ($request->image) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images/planets'), $newImageName);
        }

        $approve = 0;
        if (Auth::check()) {
            $approve = 1;
        }

        $planet = Planet::create([
                'image' => $newImageName,
                'approve' => $approve,
            ] + $validated);

        return redirect()->route('planets.create')->with('message', 'Planet created successfully');
    }

    public function update(PlanetRequest $request, $id): Response|RedirectResponse|Application|ResponseFactory
    {
        $planet = Planet::findOrFail($id);

        if (!$planet) {
            return response([
                'message' => 'Planet not found'
            ], 403);
        }

        $validated = $request->validated();
        $approve = 0;
        if (isset($validated['approve'])) {
            $approve = 1;
        }

        $planet->update([
                'approve' => $approve
            ] + $validated);

        return redirect()->route('planets.edit')->with('message', 'Planet updated successfully');
    }

    public function create(): Factory|View|Application
    {
        $galaxies = Galaxy::where('approve', 1)->get();
        return view('planets.create', ['galaxies' => $galaxies]);
    }

    public function edit(): Factory|View|Application
    {
        $planets = Planet::where('approve', 0)->get();
        return view('planets.edit', ['planets' => $planets]);
    }

    public function destroy($id): RedirectResponse
    {
        $planet = Planet::findOrFail($id);
        $planet->delete();
        return redirect()->route('planets.edit')->with('message', 'Galaxy deleted successfully');
    }
}
