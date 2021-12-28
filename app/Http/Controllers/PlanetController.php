<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanetRequest;
use App\Models\Galaxy;
use App\Models\Planet;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PlanetController extends Controller
{
    public function index(): Response|Application|ResponseFactory
    {
        return response([
            'planets' => Planet::where('approve', 1)
                ->get()
        ], 200);
    }

    public function show($id): Response|Application|ResponseFactory
    {
        $planet = Planet::where('id', $id)
            ->where('approve', 1)
            ->get();

        return response([
            'planet' => $planet
        ], 200);
    }

    public function store(PlanetRequest $request): Response|Application|ResponseFactory
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

        return response([
            'planet' => $planet
        ], 201);
    }

    public function create(): Factory|View|Application
    {
        $galaxies = Galaxy::where('approve', 1)->get();
        return view('planets.create', ['galaxies' => $galaxies]);
    }
}
