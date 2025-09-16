<?php

namespace App\Console\Commands;

use App\Jobs\SendWaJob;
use Illuminate\Console\Command;

class sendWATestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send_wa:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $name = 'Edo';
        $number = '6282285314950';
        $slug = 'Edo & Zizah';
        SendWaJob::dispatch($name, $number, $slug);
    }
}
