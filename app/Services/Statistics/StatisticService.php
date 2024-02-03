<?php

namespace App\Services\Statistics;

use App\Models\Statistic;

class StatisticService
{
    public function getStatistics($limit)
    {
        return Statistic::orderBy('total_tasks', 'desc')->take($limit)->get();
    }

    public function updateStatistics()
    {
        //update statistics in the background using a job
    }
}
