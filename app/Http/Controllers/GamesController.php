<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGamesRequest;
use App\Models\Games;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    // GET
    public function index()
    {
        return response([
            'games' => Games::get()
        ], 200);
    }

    // GET BY ID
    public function show($id)
    {
        return response([
            'game' => Games::where('id', $id)
                ->get()
        ], 200);
    }

    // POST
    public function store(StoreGamesRequest $storeGamesRequest)
    {
        $game = Games::create($storeGamesRequest->validated());

//        if ($request->hasFile('cover')) {
//            $destinationPath = 'public/storage/games';
//            $image = $request->file('cover');
//            $imageName = $image->getClientOriginalName();
//            $imagePath = $request->file('cover')->storeAs($destinationPath, $imageName);
//        }
//
//        $game = Games::create([
//            'body' => $attrs['body'],
//            'image' => $imagePath
//        ]);

        return response([
            'game' => $game
        ], 201);
    }

}
