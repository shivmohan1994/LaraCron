<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Log;
use App\User;
use Illuminate\Console\Command;
use App\UserCustom\SendMail;

class cronUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User salary will update at a particular time';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $data = User::all();
      $increment= 100;
      foreach ($data as $row) {
        $row->salary+=$increment;
        $row->save();
        // Log::info($row);
        $SendMail = new SendMail();
        $SendMail->updateCronSalary($row, $increment, $row->salary);
      }

    }
}
