<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('inspire')->everyThirtySeconds()->sendOutputTo('task-output.log');

Schedule::command('app:release-scheduled-posts')->everyMinute()->sendOutputTo('task-output.log');
