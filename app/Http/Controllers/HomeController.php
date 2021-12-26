<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Renderable
    {
        return view('welcome');
    }

    public function admin(): Renderable
    {
        $games = Game::where('approve', 0)->get();
        return view('admin', ['games' => $games]);
    }

}
