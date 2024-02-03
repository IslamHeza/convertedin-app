<?php

namespace App\Services\Tasks;

use App\Models\Task;
use App\Jobs\UpdateStatisticsJob;
use App\Services\Statistics\StatisticService;

class TaskService
{
    private $statisticService;

    public function __construct(StatisticService $statisticService)
    {
        $this->statisticService = $statisticService;
    }

    //get all tasks
    public function getTasks()
    {
        return Task::orderBy('created_at', 'desc')->get();
    }

    //get tasks paginated
    public function getTasksPaginated($perPage = 10)
    {
        return Task::orderBy('created_at', 'desc')->paginate($perPage);
    }

    //create a new task
    public function createTask($data)
    {
        $task = Task::create($data);

        //increment total tasks by 1 using a job in the background.
        dispatch(new UpdateStatisticsJob($data['assigned_to_id'], $this->statisticService));

        return $task;
    }
}
