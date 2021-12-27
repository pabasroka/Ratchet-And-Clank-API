<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlatformRequest;
use App\Models\Platform;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class PlatformsController extends Controller
{
    public function index(): Response|Application|ResponseFactory
    {
        return response([
            'platforms' => Platform::get()
        ], 200);
    }
}
