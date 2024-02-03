<?php

namespace App\Jobs;

use App\Services\Statistics\StatisticService;
use App\Services\Users\UserService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateStatisticsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    private int $userId;
    private $statisticService;

    public function __construct(int $userId, StatisticService $statisticService)
    {
        $this->userId = $userId;
        $this->statisticService = $statisticService;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //update statistics table , incrementing total_tasks by 1
        $this->statisticService->incrementTotalTasks($this->userId);
    }
}
