<?php

namespace App\Http\Controllers;

use App\Models\Release;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReleasesController extends Controller
{

    public function index(): JsonResponse
    {
        $releases = Release::where('approve', 1)
            ->get();

        $releasesJSON = [];

        foreach ($releases as $release) {
            $releasesJSON[] = [
                'id' => $release->id,
                'region' => $release->region,
                'date' => $release->date,
            ];
        }

        return response()->json($releasesJSON);
    }

    public function show($id): JsonResponse
    {
        $release = Release::where('id', $id)
            ->where('approve', 1)
            ->firstOrFail();

        $releaseJSON = [
            'id' => $release->id,
            'region' => $release->region,
            'date' => $release->date,
        ];

        return response()->json($releaseJSON);
    }

}
