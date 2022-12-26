<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class ForcedeletePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:forcedelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'executed force delete post';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //grab all softdelete post
        $posts = Post::onlyTrashed()->get();
        //force delete
        foreach ($posts as $target) {
            $target->forceDelete();
        }
        Log::info("executed forcedelet");
        return Command::SUCCESS;
    }
}
