<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class startApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the Laravel application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting the application...');

        //Database migration and seeding
        $this->info('Migration and seeding the database, please wait...');
        $this->call('migrate:fresh', ['--seed' => true]);
        $this->info('Database migration and seeding complete.');

        //Serving the application
        $this->info('Serving the application...');
        $this->call('serve');
    }
}
