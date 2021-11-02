<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{

    public function get()
    {
        $activities = DB::table('activity_log')
            ->latest()
            ->limit(10)
            ->get();

        return response()->json($activities);
    }
}
