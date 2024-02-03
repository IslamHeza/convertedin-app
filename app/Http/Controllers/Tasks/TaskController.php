<?php

namespace App\Http\Controllers\Tasks;

use App\Services\Tasks\TaskService;
use App\Services\Users\UserService;
use App\Classes\Users\UserConstants;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    private $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        return view('tasks.index', [
            'tasks' => $this->taskService->getTasksPaginated(10)
        ]);
    }

    public function create()
    {
        $userService = new UserService();
        $users = $userService->getUsersByType(UserConstants::USER_TYPE_NORMAL);
        $admins = $userService->getUsersByType(UserConstants::USER_TYPE_ADMIN);

        return view('tasks.create', [
            'users' => $users,
            'admins' => $admins,
        ]);
    }
}
