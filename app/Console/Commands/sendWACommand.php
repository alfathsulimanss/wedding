<?php

namespace App\Console\Commands;

use App\Jobs\SendWaJob;
use App\Models\InvitationList;
use App\Models\Wedding;
use Carbon\Carbon;
use Illuminate\Console\Command;

class sendWACommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:wa';

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
        $weddings = Wedding::whereDate('party', Carbon::today()->toDateString())->get();
        foreach ($weddings as $wedding){
            $invitations = InvitationList::where('wedding_id', $wedding->id)->get();
            foreach ($invitations as $invitation){
                if ($invitation->whatsapp_number){
                    $delay = \DB::table('jobs')->count()*10;
                    SendWaJob::dispatch($invitation->name, $invitation->whatsapp_number, $wedding->slug)->delay($delay);
                }
            }
        }
    }
}
