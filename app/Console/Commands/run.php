<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;


class run extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
     
      // Artisan::command('php artisan serve');
      // $this->info("Running at ".getHostByName(getHostName()).'...');
     
      shell_exec('php artisan serve --host='.getHostByName(getHostName()) .' > /dev/null 2>&1 &');
    }
}
