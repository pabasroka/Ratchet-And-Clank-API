<?php

namespace App\Http\Controllers;

use App\Models\Releases;
use Illuminate\Http\Request;

class ReleasesController extends Controller
{

    public function index()
    {
        return response([
            'releases' => Releases::get()
        ], 200);
    }

}
