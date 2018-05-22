<?php

namespace App\Console\Commands;

use App\Counter;
use App\Events\JiraNotification;
use Illuminate\Console\Command;

class ResetCounter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'counter:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the JIRA task counter.';

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
        $counter = Counter::where('id', 1)->first();

        if ($counter){
            $counter->count = 0;
            $counter->save();
        }

        event(new JiraNotification(0, ""));

        return;
    }
}
