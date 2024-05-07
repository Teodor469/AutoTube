<?php

namespace App\Console\Commands;

use App\Models\Video;
use Illuminate\Console\Command;
use Carbon\Carbon;

class ReleaseScheduledPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:release-scheduled-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Video::where('published', false)
            ->where('scheduled_time', '<=', Carbon::now())
            ->update(['published' => true]);

        $this->info('Post status successfully updated!');
    }
}
