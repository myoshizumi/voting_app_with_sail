<?php

namespace App\Http\Controllers;

use App\Models\ThanksMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RankingManagement extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $thanksTo = ThanksMessage::select('thanks_to')
            ->selectRaw('COUNT(thanks_to) as count_thanks_to, DENSE_RANK() OVER(ORDER BY COUNT(*) DESC) as ranking')
            ->groupBy('thanks_to')
            ->orderBy('count_thanks_to', 'desc')
            ->take(5)
            ->get();

        $thanksFrom = ThanksMessage::select('thanks_from')
            ->selectRaw('COUNT(thanks_from) as count_thanks_from, DENSE_RANK() OVER(ORDER BY COUNT(*) DESC) as ranking')
            ->groupBy('thanks_from')
            ->orderBy('count_thanks_from', 'desc')
            ->take(5)
            ->get();


        return view('admin.ranking-management', compact('thanksTo', 'thanksFrom'));
    }
}
