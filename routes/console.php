<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Process;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('deploy:fresh', function () {
    $composer = Process::start('composer install');
    $composer->wait();
    $this->info($composer->output());
    $migrate = Process::start('php artisan migrate');
    $migrate->wait();
    $this->info($migrate->output());
    $optimize = Process::start('php artisan optimize');
    $optimize->wait();
    $this->info($optimize->output());
})->describe('Deploy the application');
