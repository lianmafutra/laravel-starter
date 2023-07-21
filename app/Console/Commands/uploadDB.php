<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

class uploadDB extends Command
{
   /**
    * The name and signature of the console command.
    *
    * @var string
    */
   protected $signature = 'db:upload';

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
      DB::unprepared(file_get_contents('database/data-sql-kinerja.sql'));
      $this->line("Success upload & import db to server");
     
   }
}
