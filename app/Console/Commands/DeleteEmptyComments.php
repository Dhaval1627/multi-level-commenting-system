<?php

namespace App\Console\Commands;

use App\Models\Comment;
use Illuminate\Console\Command;

class DeleteEmptyComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comments:delete-empty';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete comments with empty content fields.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $count = Comment::whereNull('content')
                        ->orWhere('content', '')
                        ->delete();

        $this->info("Deleted {$count} empty comments.");
    }
}
