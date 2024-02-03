<?php

namespace App\Http\Controllers\Statistics;

use App\Models\Statistic;
use App\Http\Controllers\Controller;
use App\Services\Statistics\StatisticService;

class StatisticController extends Controller
{

    private $statisticService;

    public function __construct(StatisticService $statisticService)
    {
        $this->statisticService = $statisticService;
    }

    public function index()
    {
        //get top 10 users with the highest number of tasks
        return view('statistics.index', [
            'statistics' => $this->statisticService->getStatistics(10)
        ]);
    }
}
