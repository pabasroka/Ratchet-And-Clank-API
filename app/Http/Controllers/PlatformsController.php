<?php

namespace App\Http\Controllers;

use App\Models\Platforms;
use Illuminate\Http\Request;

class PlatformsController extends Controller
{
    public function index()
    {
        return response([
            'platforms' => Platforms::get()
        ], 200);
    }
}
