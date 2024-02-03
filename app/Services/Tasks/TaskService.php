<?php

namespace App\Services\Tasks;

use App\Models\Task;

class TaskService
{
    public function getTasks()
    {
        return Task::orderBy('created_at', 'desc')->get();
    }

    public function getTasksPaginated($perPage = 10)
    {
        return Task::orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function createTask($data)
    {
        $task = Task::create($data);
        return $task;
    }
}
