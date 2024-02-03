<?php

namespace App\Services\Statistics;

use App\Models\Statistic;

class StatisticService
{
    //get statistic by user id
    public function getStatisticByUserId($userId)
    {
        return Statistic::where('user_id', $userId)->first();
    }

    //get top users with the highest number of tasks by limit
    public function getStatistics($limit)
    {
        return Statistic::orderBy('total_tasks', 'desc')->take($limit)->get();
    }

    //create a new statistic
    public function createStatistic($userId, $totalTasks = 0)
    {
        $statistic = new Statistic();
        $statistic->user_id = $userId;
        $statistic->total_tasks = $totalTasks;
        $statistic->save();
        return $statistic;
    }

    //increment total tasks by 1
    public function incrementTotalTasks($userId)
    {
        $statistic = $this->getStatisticByUserId($userId);
        if (!$statistic) {
            $this->createStatistic($userId, 1);
            return;
        }
        $statistic->total_tasks += 1;
        $statistic->save();
        return $statistic;
    }
}
