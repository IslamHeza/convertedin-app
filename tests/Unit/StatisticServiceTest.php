<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Statistic;
use App\Classes\Users\UserConstants;
use App\Services\Statistics\StatisticService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatisticServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $statisticService;

    public function setUp(): void
    {
        parent::setUp();

        $this->statisticService = new StatisticService();

        User::factory()->create(['id' => 105, 'type' => UserConstants::USER_TYPE_NORMAL]);
    }

    public function test_get_statistic_by_user_id()
    {
        $userId = 105;
        $statistic = Statistic::create(['user_id' => $userId, 'total_tasks' => 5]);
        $result = $this->statisticService->getStatisticByUserId($userId);
        $this->assertEquals($statistic->total_tasks, $result->total_tasks);
    }

    public function test_get_statistics()
    {
        Statistic::factory()->count(5)->create(['user_id' => 105]);
        $limit = 3;
        $statistics = $this->statisticService->getStatistics($limit);
        $this->assertCount($limit, $statistics);
    }

    public function test_create_statistic()
    {
        $userId = 105;
        $result = $this->statisticService->createStatistic($userId);
        $this->assertInstanceOf(Statistic::class, $result);
        $this->assertDatabaseHas('statistics', ['user_id' => $userId]);
    }

    public function test_increment_total_tasks()
    {
        $userId = 105;
        $statistic = Statistic::factory()->create(['user_id' => $userId]);
        $result = $this->statisticService->incrementTotalTasks($userId);
        $this->assertEquals($statistic->total_tasks + 1, $result->total_tasks);
    }
}
