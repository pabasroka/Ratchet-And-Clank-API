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

        $galaxy = Galaxy::create([
            'approve' => $approve,
        ] + $validated);

        return response([
            'galaxy' => $galaxy
        ], 201);
    }

    public function create(): Factory|View|Application
    {
        return view('galaxies.create');
    }
}
