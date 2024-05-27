<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CleanStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean the storage directory';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $directory = 'public/blog';
        if (Storage::exists($directory)) {
            Storage::deleteDirectory($directory);
            Storage::makeDirectory($directory);
            $this->info('Storage directory cleaned.');
        } else {
            $this->error('Directory does not exist.');
        }
    }
}
