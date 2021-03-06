<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Game;
use App\Models\Vehicle;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function index(): JsonResponse
    {
        $vehicles = Vehicle::where('approve', 1)
            ->get();

        $vehiclesJSON = [];
        foreach ($vehicles as $vehicle) {
            if ($vehicle->image) {
                $vehicle->image = public_path('images/vehicles/' . $vehicle->image);
            }

            $vehiclesJSON[] = [
                'id' => $vehicle->id,
                'game_id' => $vehicle->game_id,
                'name' => $vehicle->name,
                'image' => $vehicle->image,
            ];
        }

        return response()->json($vehiclesJSON);
    }

    public function show($id): JsonResponse
    {
        $vehicle = Vehicle::where('id', $id)
            ->where('approve', 1)
            ->first();

        if ($vehicle->image) {
            $vehicle->image = public_path('images/vehicles/' . $vehicle->image);
        }

        $vehicleJSON = [
            'id' => $vehicle->id,
            'game_id' => $vehicle->game_id,
            'name' => $vehicle->name,
            'image' => $vehicle->image,
        ];

        return response()->json($vehicleJSON);
    }

    public function store(VehicleRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $newImageName = '';
        if ($request->image) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images/vehicles'), $newImageName);
        }

        $approve = 0;
        if (Auth::check()) {
            $approve = 1;
        }

        Vehicle::create([
                'image' => $newImageName,
                'approve' => $approve,
            ] + $validated);

        return redirect()->route('vehicles.create')->with('message', 'Vehicle created successfully');
    }

    public function update(VehicleRequest $request, $id): Response|RedirectResponse|Application|ResponseFactory
    {
        $vehicle = Vehicle::findOrFail($id);

        if (!$vehicle) {
            return response([
                'message' => 'Vehicle not found'
            ], 403);
        }

        $validated = $request->validated();
        $approve = 0;
        if (isset($validated['approve'])) {
            $approve = 1;
        }

        $vehicle->update([
                'approve' => $approve
            ] + $validated);

        return redirect()->route('vehicles.edit')->with('message', 'Vehicle updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return redirect()->route('vehicles.edit')->with('message', 'Vehicle deleted successfully');
    }

    public function create(): Factory|View|Application
    {
        $games = Game::where('approve', 1)->get();
        return view('vehicles.create', ['games' => $games]);
    }

    public function edit(): Factory|View|Application
    {
        $vehicles = Vehicle::where('approve', 0)->get();
        return view('vehicles.edit', ['vehicles' => $vehicles]);
    }
}
