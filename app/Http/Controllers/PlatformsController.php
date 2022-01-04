<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlatformRequest;
use App\Models\Platform;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PlatformsController extends Controller
{
    public function index(): JsonResponse
    {
        $platforms = Platform::where('approve', 1)
            ->get();

        $platformsJSON = [];
        foreach ($platforms as $platform) {
            $platformsJSON[] = [
                'id' => $platform->id,
                'name' => $platform->platform,
            ];
        }

        return response()->json($platformsJSON);
    }

    public function show($id): JsonResponse
    {
        $platform = Platform::where('id', $id)
            ->where('approve', 1)
            ->firstOrFail();

        $platformJSON = [
            'id' => $platform->id,
            'name' => $platform->platform,
        ];

        return response()->json($platformJSON);
    }
}
