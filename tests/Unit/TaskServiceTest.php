<?php

namespace Tests\Unit;

use App\Classes\Users\UserConstants;
use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use App\Services\Tasks\TaskService;
use App\Services\Statistics\StatisticService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $taskService;

    protected function setUp(): void
    {
        parent::setUp();

        $statisticService = new StatisticService();
        $this->taskService = new TaskService($statisticService);

        User::factory()->create(['id' => 1, 'type' => UserConstants::USER_TYPE_ADMIN]);
        User::factory()->create(['id' => 2, 'type' => UserConstants::USER_TYPE_NORMAL]);
    }

    public function test_create_task()
    {
        $taskData = ['title' => 'Test Task', 'description' => 'Test Description', 'assigned_to_id' => 2, 'assigned_by_id' => 1];

        $task = $this->taskService->createTask($taskData);

        $this->assertInstanceOf(Task::class, $task);
        $this->assertEquals('Test Task', $task->title);
        $this->assertEquals('Test Description', $task->description);
    }

    public function test_get_tasks()
    {
        Task::factory()->count(3)->create([
            'assigned_to_id' => 2,
            'assigned_by_id' => 1,
        ]);

        $tasks = $this->taskService->getTasks();
        $this->assertCount(3, $tasks);
    }

    public function test_get_tasks_paginated()
    {
        Task::factory()->count(5)->create([
            'assigned_to_id' => 2,
            'assigned_by_id' => 1,
        ]);

        $tasks = $this->taskService->getTasksPaginated(3);
        $this->assertCount(3, $tasks);
    }
}
