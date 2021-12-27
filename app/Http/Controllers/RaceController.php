<?php

namespace App\Http\Controllers;

use App\Http\Requests\RaceRequest;
use App\Models\Race;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class RaceController extends Controller
{
    public function index(): Response|Application|ResponseFactory
    {
        return response([
            'race' => Race::where('approve', 0)
                ->get()
        ], 200);
    }

    public function store(RaceRequest $request): Response|Application|ResponseFactory
    {
        $validated = $request->validated();

        $approve = 0;
        if (Auth::check()) {
            $approve = 1;
        }

        $race = Race::create([
                'approve' => $approve,
            ] + $validated);

        return response([
            'race' => $race
        ], 201);
    }

    public function create(): Factory|View|Application
    {
        return view('race.create');
    }
}
