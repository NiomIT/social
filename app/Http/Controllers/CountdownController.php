<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CountdownController extends Controller
{
    public function getCountdownTime()
    {

        $item = Event::first();
        // Replace '2023-12-31 23:59:59' with your desired end date
        $endDate = strtotime($item->start_time);
        $currentTime = time();
        $remainingTime = max(0, $endDate - $currentTime);
        return response()->json(['remainingTime' => $remainingTime]);
    }
}
