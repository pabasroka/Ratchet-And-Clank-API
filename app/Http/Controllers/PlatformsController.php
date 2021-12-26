<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformsController extends Controller
{
    public function index()
    {
        return response([
            'platforms' => Platform::get()
        ], 200);
    }
}
