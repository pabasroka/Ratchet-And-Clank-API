<?php

namespace App\Http\Controllers;

use App\Models\Release;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReleasesController extends Controller
{

    public function index(): Response|Application|ResponseFactory
    {
        return response([
            'releases' => Release::where('approve', 0)
                ->get()
        ], 200);
    }

}
