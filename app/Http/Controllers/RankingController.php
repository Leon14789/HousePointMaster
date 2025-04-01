<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public static function ShowRanking()
    {
        $rooms = Room::orderBy('point', 'desc')->get();
        $maxPoints = $rooms->max('point');

        if ($maxPoints == 0) {
            $maxPoints = 1;
        }

        return [
            'rooms' => $rooms,
            'maxPoints' => $maxPoints,
        ];
    }
}
