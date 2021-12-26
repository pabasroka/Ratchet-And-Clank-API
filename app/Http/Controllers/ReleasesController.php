<?php

namespace App\Http\Controllers;

use App\Models\Release;
use Illuminate\Http\Request;

class ReleasesController extends Controller
{

    public function index()
    {
        return response([
            'releases' => Release::get()
        ], 200);
    }

}
