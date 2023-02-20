<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class FreshDeploy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy {mode? : Fresh deploy (php artisan deploy fresh) or updating (php artisan deploy)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'One line deploy';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $mode = $this->argument('mode');
        if ($mode === 'fresh') {
            $commands = [
                'git pull',
                'composer install',
                'php artisan migrate:fresh --seed',
                'php artisan optimize:clear',
                'php artisan optimize',
            ];
        } else {
            $commands = [
                'git pull',
                'composer install',
                'php artisan migrate',
            ];
        }

        foreach ($commands as $command) {
            $process = Process::start($command);
            $process->wait();
            $this->info($process->output());
        }
    }
}
