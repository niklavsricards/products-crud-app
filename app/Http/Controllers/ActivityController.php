<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{

    public function get(Request $request)
    {
        $dateFrom = $request->query('dateFrom') ?? '';
        $dateTo = $request->query('dateTo') ?? '';

        $activities = DB::table('activity_log')
            ->havingBetween('number_of_orders', [$dateFrom, $dateTo])
            ->limit(5)
            ->get();


    }
}
