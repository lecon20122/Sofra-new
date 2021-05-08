<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => 'i am protected'
        ]);
    }
    public function dashboard()
    {
        return response()->json([
            'data' => 'i am restaurant protected'
        ]);
    }
}
